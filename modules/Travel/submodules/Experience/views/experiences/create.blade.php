@extends("Theme::layouts.admin")

@section("content")
    <v-container fluid grid-list-lg>

        @include("Theme::partials.banner")

        <form action="{{ route('experiences.store') }}" method="POST">
            {{ csrf_field() }}

            <v-layout row wrap>
                <v-flex md9>
                    <v-card class="mb-3 elevation-1">
                        <v-toolbar card class="transparent">
                            <v-toolbar-title class="accent--text">{{ __('New Experience') }}</v-toolbar-title>
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
                                lazy
                                v-model="resource.menus.date_start"
                                transition="scale-transition"
                                offset-y
                                full-width
                                :nudge-left="40"
                                max-width="290px"
                            >
                                <v-text-field
                                    slot="activator"
                                    name="date_start"
                                    :error-messages="errors.date_start"
                                    label="{{ __('Date Start') }}"
                                    v-model="resource.item.date_start"
                                ></v-text-field>
                                <div>
                                    <v-date-picker
                                        no-title
                                        v-model="resource.item.date_start"
                                    ></v-date-picker>
                                    <v-time-picker
                                        no-title
                                        v-model="resource.item.time_start"
                                    ></v-time-picker>
                                </div>
                            </v-menu>

                            <v-menu
                                lazy
                                v-model="resource.menus.date_end"
                                transition="scale-transition"
                                offset-y
                                full-width
                                :nudge-left="40"
                                max-width="290px"
                            >
                                <v-text-field
                                    slot="activator"
                                    name="date_end"
                                    :error-messages="errors.date_end"
                                    label="{{ __('Date Start') }}"
                                    v-model="resource.item.date_end"
                                ></v-text-field>
                                <v-date-picker
                                    no-title
                                    name="date_end"
                                    v-model="resource.item.date_end"
                                ></v-date-picker>
                            </v-menu>
                        </v-card-text>

                        <v-divider></v-divider>

                        {{-- Editor --}}
                        @include("Page::interactive.editor")
                        {{-- /Editor --}}
                    </v-card>

                    @include("Experience::interactives.map")
                </v-flex>

                <v-flex md3>
                    @include("Theme::cards.saving")

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
                            name: '{{ old('name') }}',
                            code: '{{ old('code') }}',
                            reference_number: '{{ old('reference_number') }}',
                            user: '{{ old('user') }}',
                            map: '{{ old('map') }}',
                            map_instructions: {!! json_encode(old('map_instructions')) !!},
                            date_start: '{{ old('date_start') }}',
                            date_end: '{{ old('date_end') }}',
                        },
                        quill: {
                            html: '{{ old('body') }}',
                            delta: {!! json_encode(old('delta')) !!},
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
            }
        })
    </script>
@endpush
