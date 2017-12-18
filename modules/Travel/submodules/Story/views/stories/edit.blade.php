@extends("Theme::layouts.admin")

@section("content")
    <v-container fluid grid-list-lg>

        @include("Theme::partials.banner")

        <form action="{{ route('stories.update', $resource->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            {{-- <input type="hidden" name="user" value="{{ user()->id }}"> --}}
            <v-layout row wrap>
                <v-flex md9>
                    <v-card class="mb-3 elevation-1">
                        <v-toolbar card class="transparent">
                            <v-toolbar-title class="accent--text">{{ __('Edit Story') }}</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-card-text>
                            <v-text-field
                                name="title"
                                :error-messages="errors.title"
                                label="{{ __('Title') }}"
                                v-model="resource.item.title"
                                @input="() => { resource.item.code = $options.filters.codeify(resource.item.title); }"
                            ></v-text-field>

                            <input type="hidden" name="code" v-model="resource.item.code">

                            <v-text-field
                                :append-icon-cb="() => (resource.readonly.code = !resource.readonly.code)"
                                :append-icon="resource.readonly.code ? 'fa-lock' : 'fa-unlock'"
                                :readonly="resource.readonly.code"
                                :value="resource.item.code?resource.item.code:resource.item.code | slugify"
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

                    {{-- @include("Page::cards.page-attributes") --}}
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
                    featuredImage: {
                        old: [
                            {thumbnail: '{{ $resource->feature }}'}
                        ],
                        new: {
                            thumbnail: '{{ $resource->feature }}',
                        }
                    },
                    resource: {
                        item: {!! json_encode($resource) !!},
                        quill: {
                            html: '{!! $resource->body !!}',
                            delta: {!! $resource->delta !!},
                        },
                        readonly: {
                            code: true,
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
                    errors: {!! json_encode($errors->getMessages()) !!},
                }
            },
            mounted () {
                this.featuredImage.old = '{!! old('feature_obj') !!}' ? JSON.parse('{!! old('feature_obj') !!}') : [{thumbnail: '{{ $resource->feature }}'}];
            }
        })
    </script>
@endpush
