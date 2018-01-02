@extends("Theme::layouts.admin")

@section("content")
    <v-container fluid grid-list-lg>

        @include("Theme::partials.banner")

        <form action="{{ route('bookings.store') }}" method="POST">
            {{ csrf_field() }}

            <v-layout row wrap>
                <v-flex md9>
                    <v-card class="mb-3 elevation-1">
                        <v-toolbar card class="transparent">
                            <v-toolbar-title class="accent--text">{{ __('New Booking') }}</v-toolbar-title>
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

                            </v-menu>
                        </v-card-text>

                        <v-divider></v-divider>

                        {{-- Editor --}}
                        @include("Page::interactive.editor")
                        {{-- /Editor --}}
                    </v-card>

                    @include("Booking::interactives.map")
                </v-flex>

                <v-flex md3>
                    @include("Theme::cards.saving")

                    @include("Booking::cards.price")

                    @include("Theme::interactives.featured-image")

                    @include("Booking::interactives.managers")

                    {{-- @include("Budget::cards.budget") --}}

                </v-flex>

            </v-layout>
        </form>
    </v-container>
@endsection


@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        item: {
                            name: '{{ old('name') }}',
                            code: '{{ old('code') }}',
                            user: '{{ old('user') }}',
                            map: '{!! old('map') !!}',
                            map_instructions: {!! json_encode(old('map_instructions')) !!},
                            price: '{{ old('price') }}',
                        },
                        dates: {
                            date_start_model: true,
                            date_start: '{{ old('vue_date_start') }}',
                            time_start: '{{ old('vue_time_start') }}',
                            date_end_model: true,
                            date_end: '{{ old('vue_date_end') }}',
                            time_end: '{{ old('vue_time_end') }}',
                        },
                        quill: {
                            html: '{!! old('body') !!}',
                            delta: JSON.parse({!! json_encode(old('delta')) !!}),
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
                    console.log(to)
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
        })
    </script>
@endpush
