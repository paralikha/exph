@extends("Frontier::layouts.admin")

@section("content")
    <v-container fluid grid-list-lg>
        @include("Theme::partials.banner")

        <form action="{{ route('pages.store') }}" method="POST">
            {{ csrf_field() }}
            <v-layout row wrap>
                <v-flex md9>
                    <v-card class="mb-3 elevation-1">
                        <v-toolbar card class="transparent">
                            <v-toolbar-title class="accent--text">{{ __('New Page') }}</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-card-text>
                            <v-text-field
                                name="title"
                                :error-messages="errors.title"
                                label="{{ __('Title') }}"
                                v-model="resource.title"
                                @input="() => { resource.code = $options.filters.slugify(resource.title); }"
                            ></v-text-field>

                            <input type="hidden" name="code" v-model="resource.code">

                            <v-text-field
                                :append-icon-cb="() => (resource.readonly.slug = !resource.readonly.slug)"
                                :append-icon="resource.readonly.slug ? 'fa-lock' : 'fa-unlock'"
                                :readonly="resource.readonly.slug"
                                :value="resource.slug?resource.slug:resource.code | slugify"
                                label="{{ __('Code') }}"
                                name="code"
                                persistent-hint
                                :error-messages="errors.code"
                                hint="{{ __("Code is used in generating URL. To customize the code, toggle the lock icon on this field.") }}"
                            ></v-text-field>
                        </v-card-text>

                        <v-divider></v-divider>

                        {{-- Editor --}}
                        @include("Page::interactive.editor")
                        {{-- /Editor --}}
                    </v-card>
                </v-flex>

                <v-flex md3>
                    @include("Theme::cards.saving")

                    @include("Theme::interactives.featured-image")

                    @include("Page::cards.page-attributes")
                </v-flex>

            </v-layout>
        </form>
    </v-container>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.js') }}"></script>
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        title: '',
                        slug: '',
                        code: '',
                        parent: null,
                        parent_id: '',
                        template: 'generic',
                        children: [],
                        readonly: {
                            slug: true,
                        },
                        toggle: {
                            parent_id: false,
                        },
                        new: true,
                        misc: {
                            parent: {
                                title: 'None',
                            }
                        }
                    },
                    errors: {!! json_encode($errors->getMessages()) !!}
                }
            },
        })
    </script>
@endpush
