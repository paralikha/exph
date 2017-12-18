{{--
Template Name: Profile Template
Description: A page for all experiences.
Author: Princess Ellen Alto
Version: 1.0
--}}


@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <v-container fluid grid-list-lg>
        <v-layout row wrap justify-center align-top>
            <v-flex lg8 md10 xs12>
                <v-layout row wrap>
                    <v-flex md4 xs12>
                        <v-card>
                            <v-card-media src="{{ assets('frontier/images/public/surf.jpg') }}" height="300px"></v-card-media>
                            <v-list two-line>
                                <v-list-tile>
                                    <v-list-tile-content>
                                          <v-list-tile-title>Joined in November 2017</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon color="indigo">phone</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                          <v-list-tile-title>(650) 555-1234</v-list-tile-title>
                                          <v-list-tile-sub-title>Mobile</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile>
                                    <v-list-tile-action></v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>(323) 555-6789</v-list-tile-title>
                                            <v-list-tile-sub-title>Work</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                </v-list-tile>
                                <v-divider inset></v-divider>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon color="indigo">mail</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>aliconnors@example.com</v-list-tile-title>
                                        <v-list-tile-sub-title>Personal</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile>
                                    <v-list-tile-action></v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>ali_connors@example.com</v-list-tile-title>
                                        <v-list-tile-sub-title>Work</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-divider inset></v-divider>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon color="indigo">location_on</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>221 B Baker Street</v-list-tile-title>
                                        <v-list-tile-sub-title>London, UK</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-flex>
                    <v-flex md8 xs12>
                        <v-card class="elevation-1 mb-3">
                            <v-card-text>
                            <div class="headline">Hi, I'm Ali Connors!</div>
                            </v-card-text>
                        </v-card>

                        <v-card class="elevation-1 mb-3">
                            <v-card-text>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quisquam vel nostrum amet aperiam tempore! Eius suscipit, repellat, illum itaque eum maxime excepturi dolorum tenetur rem in ad. Aspernatur, autem!
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>

            </v-flex>
        </v-layout>
    </v-container>

@include("Public::sections.footer")
@endsection


@push('css')
    <style>
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        .fixed-nav {
            position: fixed !important;
            bottom: 0;
            width: 100%;
            z-index: 1;
        }
        .details-btn .btn__content {
            padding-left: 0;
            padding-right: 0;
        }
    </style>
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    dialog: {
                        billing: false
                    },
                }
            },
        });
    </script>
@endpush
