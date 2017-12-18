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

                            <v-menu
                                :close-on-content-click="false"
                                :nudge-left="40"
                                full-width
                                lazy
                                max-width="290px"
                                offset-y
                                transition="scale-transition"
                                v-model="resource.menus.date_start"
                            >
                                <v-text-field
                                    slot="activator"
                                    name="date_start"
                                    :error-messages="errors.date_start"
                                    label="{{ __('Start Date') }}"
                                    v-model="resource.item.date_start"
                                ></v-text-field>
                                <div>
                                    <v-date-picker
                                        no-title
                                        name="date_start"
                                        v-model="resource.dates.date_start"
                                        actions
                                        v-if="resource.dates.date_start_model"
                                    >
                                        <template scope="{save, cancel}">
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                                <v-btn flat color="primary" @click="resource.dates.date_start_model = !resource.dates.date_start_model"><v-icon>access_time</v-icon></v-btn>
                                            </v-card-actions>
                                        </template>
                                    </v-date-picker>
                                    <v-time-picker
                                        v-else
                                        v-model="resource.dates.time_start"
                                        actions
                                    >
                                        <template scope="{save, cancel}">
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                                <v-btn flat color="primary" @click="save">{{ __('OK') }}</v-btn>
                                            </v-card-actions>
                                        </template>
                                    </v-time-picker>
                                    <input type="hidden" name="vue_date_start" :value="resource.date_start">
                                    <input type="hidden" name="vue_time_start" :value="resource.time_start">
                                </div>
                            </v-menu>

                            <v-menu
                                :close-on-content-click="false"
                                :nudge-left="40"
                                full-width
                                lazy
                                max-width="290px"
                                offset-y
                                transition="scale-transition"
                                v-model="resource.menus.date_end"
                            >
                                <v-text-field
                                    slot="activator"
                                    name="date_end"
                                    :error-messages="errors.date_end"
                                    label="{{ __('End Date') }}"
                                    v-model="resource.item.date_end"
                                ></v-text-field>
                                <div>
                                    <v-date-picker
                                        no-title
                                        name="date_end"
                                        v-model="resource.dates.date_end"
                                        actions
                                        v-if="resource.dates.date_end_model"
                                    >
                                        <template scope="{save, cancel}">
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                                <v-btn flat color="primary" @click="resource.dates.date_end_model = !resource.dates.date_end_model"><v-icon>access_time</v-icon></v-btn>
                                            </v-card-actions>
                                        </template>
                                    </v-date-picker>
                                    <v-time-picker
                                        v-else
                                        v-model="resource.dates.time_end"
                                        actions
                                    >
                                        <template scope="{save, cancel}">
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                                <v-btn flat color="primary" @click="save">{{ __('OK') }}</v-btn>
                                            </v-card-actions>
                                        </template>
                                    </v-time-picker>
                                    <input type="hidden" name="vue_date_end" :value="resource.date_end">
                                    <input type="hidden" name="vue_time_end" :value="resource.time_end">
                                </div>
                            </v-menu>
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

                    @include("Experience::cards.price")

                    @include("Theme::interactives.featured-image")

                    @include("Experience::interactives.managers")

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
                            name: '{{ $resource->name }}',
                            code: '{{ $resource->code }}',
                            reference_number: '{{ $resource->reference_number }}',
                            user: parseInt('{{ $resource->user->id }}'),
                            map: '{{ $resource->map }}',
                            map_instructions: {!! json_encode($resource->map_instructions) !!},
                            date_start: '{{ $resource->date_start }}',
                            date_end: '{{ $resource->date_end }}',
                            price: '{{ $resource->price }}',
                            amenities: {!! json_encode($resource->amenities()->select(['icon', 'id', 'name'])->get()->toArray()) !!},
                        },
                        dates: {
                            date_start_model: true,
                            date_start: '{{ date('Y-m-d', strtotime($resource->date_start)) }}',
                            time_start: '{{ date('H:i:s', strtotime($resource->date_start)) }}',
                            date_end_model: true,
                            date_end: '{{ date('Y-m-d', strtotime($resource->date_end)) }}',
                            time_end: '{{ date('H:i:s', strtotime($resource->time_end)) }}',
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
            mounted () {
                {{-- alert('{{ $resource->user->id }}') --}}
            }
        })
    </script>
@endpush
