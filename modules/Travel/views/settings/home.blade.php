@extends("Theme::layouts.admin")

@section("content")

    <v-container fluid>
        @include("Theme::partials.banner")
        <v-layout row wrap>
            <v-flex sm6 md8 xs12 offset-md2>

                <v-card class="mb-3 elevation-1">
                    <v-card-text>
                        <v-toolbar class="transparent elevation-0">
                            <v-toolbar-title class="accent--text"><v-icon left>home</v-icon>{{ __('Home Settings') }}</v-toolbar-title>
                        </v-toolbar>

                        {{-- {{ dd(settings('home_banner_title')) }} --}}

                        <form action="{{ route('settings.store') }}" method="POST">
                            {{ csrf_field() }}

                            <v-subheader>{{ __('Banner Section') }}</v-subheader>
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
                                    multi-line
                                    name="home_banner_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('home_banner_subtitle') ? old('home_banner_subtitle') : settings('home_banner_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-subheader>{{ __('Categories Section') }}</v-subheader>
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
                                    multi-line
                                    name="category_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('category_subtitle') ? old('category_subtitle') : settings('category_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>

                            <v-subheader>{{ __('Video Section') }}</v-subheader>
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
                                    multi-line
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
                            {{-- <v-card-text> --}}
                                {{-- value: video_bg --}}
                                {{-- @include("Travel::interactives.featured-image") --}}
                               {{--  <v-card class="transparent elevation-0" role="button" @click="$refs.siteLogoFile.click()">
                                    <v-toolbar dense card class="transparent">
                                        <v-toolbar-title class="caption">{{ __('Video Background Image') }}</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-btn icon ripple @click.stop="clearPreview"><v-icon>close</v-icon></v-btn>
                                    </v-toolbar>
                                    <v-avatar tile size="100%">
                                        <img v-if="resource.item.video_bg" :src="resource.item.video_bg" role="button">
                                        <div v-else class="pa-5 grey--text text-xs-center caption">
                                            {{ __('Add a site logo') }}
                                        </div>
                                        <input ref="siteLogoFile" name="video_bg" type="file" class="hidden-sm-and-up" accept=".png,.jpg,image/jpeg,image/png" @change="loadFile">
                                    </v-avatar>
                                </v-card> --}}
                            {{-- </v-card-text> --}}

                            <v-subheader>{{ __('Stories Section') }}</v-subheader>
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
                                    multi-line
                                    name="story_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('story_subtitle') ? old('story_subtitle') : settings('story_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>

                            <v-subheader>{{ __('Road Tripper Review Section') }}</v-subheader>
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
                                    multi-line
                                    name="review_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('review_subtitle') ? old('review_subtitle') : settings('review_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                {{-- value: review_bg --}}
                                {{-- @include("Travel::interactives.featured-image") --}}
                            </v-card-text>

                            <v-subheader>{{ __('Partnerships and Media Section') }}</v-subheader>
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
                                    multi-line
                                    name="partnership_subtitle"
                                    input-group
                                    hide-details
                                    value="{{ old('partnership_subtitle') ? old('partnership_subtitle') : settings('partnership_subtitle') }}"
                                ></v-text-field>
                            </v-card-text>

                            <v-subheader>{{ __('Call to Action Section') }}</v-subheader>
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
                                    multi-line
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

                            <v-subheader>{{ __('Payment Reminder') }}</v-subheader>
                            <v-card-text>
                                <v-text-field
                                    label="{{ __('Type a Message') }}"
                                    name="reminder"
                                    input-group
                                    hide-details
                                    value="{{ old('reminder') ? old('reminder') : settings('reminder') }}"
                                ></v-text-field>
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
                        item: {
                            video_bg: '{{ (old('video_bg') ? url(old('video_bg')) : null) ?? url(settings('video_bg', 'logo.png')) }}',
                        },
                    },
                };
            },

            methods: {
                loadFile ($event) {
                    let self = this;
                    let reader = new FileReader();

                    self.files = $event.target.files[0]; //this.$refs.siteLogoFile.file;

                    reader.onloadend = function () {
                        self.resource.item.video_bg = reader.result;
                    }

                    if (self.files) {
                        reader.readAsDataURL(self.files);
                    }
                },
                clearPreview () {
                    this.file = null
                    this.resource.item.video_bg = null;
                }
            }
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.css') }}">
@endpush
