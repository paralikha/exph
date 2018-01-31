@extends("Theme::layouts.admin")

@section("content")

    <v-container fluid>
        @include("Theme::partials.banner")
        <v-layout row wrap>
            <v-flex sm6 md8 xs12 offset-md2>

                <v-card class="mb-3 elevation-1">
                    <v-card-text>
                        <v-toolbar class="transparent elevation-0">
                            <v-toolbar-title class="accent--text">{{ __('Home Settings') }}</v-toolbar-title>
                        </v-toolbar>

                        {{-- {{ dd(settings('home_banner_title')) }} --}}

                        <form action="{{ route('settings.home') }}" method="POST">
                            {{ csrf_field() }}

                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Banner Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Home Title') }}"
                                    name="home_banner_title"
                                    input-group
                                    hide-details
                                    value="{{ old('home_banner_title') ? old('home_banner_title') : settings('home_banner_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Home Subtitle') }}"
                                    name="home_banner_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('home_banner_subtitle') ? old('home_banner_subtitle') : settings('home_banner_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Categories Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Category Title') }}"
                                    name="category_title"
                                    input-group
                                    hide-details
                                    value="{{ old('category_title') ? old('category_title') : settings('category_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Category Subtitle') }}"
                                    name="category_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('category_subtitle') ? old('category_subtitle') : settings('category_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>

                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Video Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Video Title') }}"
                                    name="video_title"
                                    input-group
                                    hide-details
                                    value="{{ old('video_title') ? old('video_title') : settings('video_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Video Subtitle') }}"
                                    name="video_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('video_subtitle') ? old('video_subtitle') : settings('video_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Video Link') }}"
                                    name="video_link"
                                    input-group
                                    hide-details
                                    value="{{ old('video_link') ? old('video_link') : settings('video_link') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                {{-- value: video_bg --}}
                                {{-- @include("Travel::interactives.featured-image") --}}
                                <input
                                    name="video_bg"
                                    type="file"
                                    value="{{ old('video_bg') ? old('video_bg') : settings('video_bg') }}">
                            </v-card-text>

                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Stories Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Story Title') }}"
                                    name="story_title"
                                    input-group
                                    hide-details
                                    value="{{ old('story_title') ? old('story_title') : settings('story_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Story Subtitle') }}"
                                    name="story_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('story_subtitle') ? old('story_subtitle') : settings('story_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>

                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Road Tripper Review Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Review Title') }}"
                                    name="review_title"
                                    input-group
                                    hide-details
                                    value="{{ old('review_title') ? old('review_title') : settings('review_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Review Subtitle') }}"
                                    name="review_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('review_subtitle') ? old('review_subtitle') : settings('review_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                {{-- value: review_bg --}}
                                {{-- @include("Travel::interactives.featured-image") --}}
                                <input
                                    name="video_bg"
                                    type="file"
                                    value="{{ old('review_bg') ? old('review_bg') : settings('review_bg') }}">
                            </v-card-text>

                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Partnerships and Media Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Partnerships and Media Title') }}"
                                    name="partnership_title"
                                    input-group
                                    hide-details
                                    value="{{ old('partnership_title') ? old('partnership_title') : settings('partnership_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Partnerships and Media Subtitle') }}"
                                    name="partnership_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('partnership_subtitle') ? old('partnership_subtitle') : settings('partnership_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>

                            <v-subheader><v-icon left>home</v-icon>&nbsp;{{ __('Call to Action Section') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Title') }}"
                                    name="cta_title"
                                    input-group
                                    hide-details
                                    value="{{ old('cta_title') ? old('cta_title') : settings('cta_title') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Subtitle') }}"
                                    name="cta_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('cta_subtitle') ? old('cta_subtitle') : settings('cta_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                {{-- value: cta_bg --}}
                                {{-- @include("Travel::interactives.featured-image") --}}
                            </v-card-text>

                            {{-- Submit --}}
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn type="submit" primary>{{ __('Save') }}</v-btn>
                            </v-card-actions>
                        </form>
                    <v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
        .uppercase {
            text-transform: uppercase;
        }
    </style>
@endpush

@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        //
                    },
                    featuredImageValue: '',
                };
            },
            methods: {
                loadFile ($event) {
                    let self = this;
                    let reader = new FileReader();

                    self.files = $event.target.files[0]; //this.$refs.siteLogoFile.file;

                    reader.onloadend = function () {
                        self.resource.item.site_logo = reader.result;
                    }

                    if (self.files) {
                        reader.readAsDataURL(self.files);
                    }
                },
                clearPreview () {
                    this.file = null
                    this.resource.item.site_logo = null;
                },
                getValue(vara, val) {
                    vara = val;
                }
            }
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.css') }}">
@endpush
