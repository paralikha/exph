{{--
Template Name: Privacy Policy Template
Description: A page for all experiences.
Author: Princess Ellen Alto
Version: 1.0
--}}

@extends("Theme::layouts.auth")

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Theme::partials.navigation")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1">
        <v-card-media src="{{ $page->feature }}" height="300">
            <v-layout
                column
                align-center
                justify-center
                class="white--text"
                >
                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%; top: 0;"></div>
                <v-card dark class="text-xs-center elevation-0 transparent">
                    <h3 class="mb-3 fw-500">{!! $page->body !!}</h3>
                </v-card>
            </v-layout>
        </v-card-media>
    </v-card>
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg7 md8 sm12 xs12>
                <v-layout row wrap>
                    <v-flex xs12>
                        <v-card class="elevation-1">
                            <v-toolbar class="elevation-0 white">
                                <v-toolbar-title>{{ __('Policies') }}</v-toolbar-title>
                            </v-toolbar>
                            <v-divider></v-divider>
                            <v-card-text>
                                <h3><strong>TBA</strong></h3>
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
        ol {
            counter-reset: nav-counter;
            margin: 0;
        }
        li {
            counter-increment: nav-counter;
        }
        li::before {
            content: counter(nav-counter);
            color: #616161;
            padding-right: 0.6em;
        }
        li li::before {
             content: counters(nav-counter, ".") "";
        }
        ol, li {
            list-style: none;
        }
        ol li {
            padding-top: 10px!important;
            padding-bottom: 10px!important;
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

                }
            },
        });
    </script>
@endpush
