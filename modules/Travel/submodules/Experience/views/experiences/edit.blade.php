@extends("Theme::layouts.admin")

@section("head-title", __("Edit $resource->name"))

@section("content")

    <v-container fluid grid-list-lg>

        @include("Theme::partials.banner")

        <form action="{{ route('experiences.update', $resource->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <v-layout row wrap>
                <v-flex md9>
                    <v-card class="mb-3 elevation-1">
                        <v-toolbar card class="transparent">
                            <v-toolbar-title class="accent--text">{{ __('Edit Experience') }}</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>

                        <v-card-text>
                            <v-text-field
                                :error-messages="errors.name"
                                label="{{ __('Name') }}"
                                name="name"
                                v-model="resource.item.name"
                                @input="(v) => { resource.item.code = v }"
                            ></v-text-field>

                            <v-text-field
                                :append-icon-cb="() => (resource.readonly.slug = !resource.readonly.slug)"
                                :append-icon="resource.readonly.slug ? 'fa-lock' : 'fa-unlock'"
                                :error-messages="errors.code"
                                :readonly="resource.readonly.slug"
                                hint="{{ __("Will be used as a URL slug.") }}"
                                label="{{ __('Code') }}"
                                name="code"
                                persistent-hint
                                :value="resource.item.code?resource.item.code:'' | slugify"
                            ></v-text-field>

                            <v-text-field
                                name="reference_number"
                                :error-messages="errors.reference_number"
                                label="{{ __('Reference Number') }}"
                                v-model="resource.item.reference_number"
                                persistent-hint
                                hint="{{ __("Will be generated randomly if blank.") }}"
                            ></v-text-field>

                        </v-card-text>

                        <v-divider></v-divider>

                        {{-- Editor --}}
                        @include("Page::interactive.editor")
                        {{-- /Editor --}}
                        @include("Experience::interactives.amenities")
                    </v-card>

                    @include("Experience::interactives.map")
                </v-flex>

                <v-flex md3>
                    @include("Theme::cards.saving")

                    @include("Experience::cards.availabilities")

                    @include("Experience::cards.price")

                    @include("Theme::interactives.featured-image")

                    @include("Experience::interactives.managers")

                    @include("Category::cards.category")
                </v-flex>

            </v-layout>
        </form>
    </v-container>
@endsection


@push('pre-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        item: {
                            name: '{{ $resource->name }}',
                            code: '{{ $resource->code }}',
                            reference_number: '{{ $resource->reference_number }}',
                            user: parseInt('{{ $resource->user->id }}'),
                            map: '{!! $resource->map !!}',
                            map_instructions: {!! json_encode($resource->map_instructions) !!},
                            date_start: '{{ date('Y-m-d h:ia', strtotime($resource->date_start)) }}',
                            date_end: '{{ date('Y-m-d h:ia', strtotime($resource->date_end)) }}',
                            price: '{{ $resource->price }}',
                            category: '{{ $resource->category_id }}',
                            amenities: {!! json_encode($resource->amenities()->select(['icon', 'id', 'name'])->get()->toArray()) !!},
                        },
                        dates: {
                            items: [],
                            date_start_model: true,
                            date_start: '{{ date('Y-m-d', strtotime($resource->date_start)) }}',
                            time_start: '{{ date('h:ia', strtotime($resource->date_start)) }}',
                            date_end_model: true,
                            date_end: '{{ date('Y-m-d', strtotime($resource->date_end)) }}',
                            time_end: '{{ date('h:ia', strtotime($resource->time_end)) }}',
                        },
                        quill: {
                            html: '{!! $resource->body !!}',
                            delta: JSON.parse({!! json_encode($resource->delta) !!}),
                        },
                        managers: {
                            items: {!! json_encode($managers->toArray()) !!},
                        },
                        readonly: {
                            slug: true,
                        },
                        menus: {
                            date_start: false,
                            date_end: false,
                        },
                        new: true,
                        amenities: {
                            items: {!! json_encode($amenities->toArray()) !!},
                            current: { icon: '', name: '', id: '' },
                        },
                    },
                    errors: {!! json_encode($errors->getMessages()) !!},
                    addform: {
                        model: false,
                    },
                }
            },
            methods: {
                codify (source) {
                    let s = source.split(' ');
                    let c = [];
                    for (var i = 0; i < s.length; i++) {
                        c.push(s[i].charAt(0).toUpperCase());
                    }
                    let variable = c.join('');
                    return variable;
                },
                add (to, push) {
                    if (! to) {
                        to = [];
                    }
                    to.push(push);
                },
                remove (from, key) {
                    from.splice(key, 1);
                }
            },
            watch: {
                // DATE_START
                'resource.dates.date_start': function (val) {
                    this.resource.item.date_start = val + ' ' + this.resource.dates.time_start;
                },

                // TIME_END
                'resource.dates.time_start': function (val) {
                    this.resource.item.date_start = this.resource.dates.date_start + ' ' + val;
                },

                // DATE_END
                'resource.dates.date_end': function (val) {
                    this.resource.item.date_end = val + ' ' + this.resource.dates.time_end;
                },

                // TIME_END
                'resource.dates.time_end': function (val) {
                    this.resource.item.date_end = this.resource.dates.date_end + ' ' + val;
                },
            },
            mounted () {
                var items = {!! json_encode($resource->availabilities->toArray()) !!};
                for (var i = 0; i < items.length; i++) {
                    let current = items[i];
                    this.resource.dates.items.push({
                        id: current.id,
                        start: {
                            model: false,
                            obj_date: null,
                            date_model: true,
                            date: moment(current.date_start).format('YYYY-MM-DD'),
                            datetime: moment(current.date_start),
                            time: moment(current.date_start).format('HH:mma'),
                            time_model: false,
                            obj_time: null,
                        },
                        end: {
                            model: false,
                            obj_date: null,
                            date_model: true,
                            date: moment(current.date_end).format('YYYY-MM-DD'),
                            datetime: moment(current.date_end),
                            time: moment(current.date_end).format('HH:mma'),
                            time_model: false,
                            obj_time: null,
                        },
                    });
                }
                {{-- alert('{{ $resource->user->id }}') --}}
            }
        })
    </script>
@endpush
