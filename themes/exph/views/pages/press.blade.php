@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1 hero">
        <v-parallax src="{{ assets('frontier/images/placeholder/9.png') }}" height="450">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("PRESS AND MEDIA") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{__("A travel company that creates unique, memorable, and epic experiences")}}</h5>
            </v-layout>
        </v-parallax>
    </v-card>

    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg8 md10 xs12>
                <v-card-text class="text-xs-center my-3">
                    <h2 class="display-1">{{ __("Philippine’s First Experience Travel Company") }}</h2>
                    <h2 class="subheading grey--text text--darken-1">
                        With more than 3 years of experience as the pioneers of Random Road Trip
                    </h2>
                </v-card-text>
            </v-flex>
        </v-layout>
        <v-layout row wrap align-center justify-center>
            <v-flex lg10 sm12 xs12>

                <v-layout row wrap>
                    <v-flex md4 sm6 xs12>
                        <v-card class="elevation-1 mb-3">
                            <v-card-media height="200px" src="{{ assets('frontier/images/public/go.jpg') }}"></v-card-media>
                            <v-card-text>
                                <div class="subheading fw-500">Window Seat Philippines</div>
                                <div class="caption grey--text text--darken-1"><v-icon class="body-1 mb-1">schedule</v-icon> March 25, 2017</div>
                            </v-card-text>
                            <v-card-text>
                                <p>What does <span class="primary--text">www.windowseat.ph</span> have to say?</p>
                                <p>Experience.ph is a travel website that pioneered touring people around on random road trips. They won’t take you on planned trips to a known place.</p>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn flat primary href="http://windowseat.ph/experience-philippines-random-roadtrips">Read More</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-flex>

                    <v-flex md4 sm6 xs12>
                        <v-card class="elevation-1 mb-3">
                            <v-card-media height="200px" src="{{ assets('frontier/images/public/h7.jpg') }}"></v-card-media>
                            <v-card-text>
                                <div class="subheading fw-500">Entrepreneur Philippines</div>
                                <div class="caption grey--text text--darken-1"><v-icon class="body-1 mb-1">schedule</v-icon> April 17, 2017</div>
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
        .hero .parallax__content {
            padding: 0;
        }
        .fixed-nav {
            position: fixed !important;
            bottom: 0;
            width: 100%;
            z-index: 1;
        }
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        .banner .parallax__content {
            padding: 0;
        }
        .block {
            display: block !important;
        }
        .c-lift {
            transition: all .2s ease;
        }
        .c-lift:hover {
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
            box-shadow: 0 1px 8px rgba(0,0,0,.2),0 3px 4px rgba(0,0,0,.14),0 3px 3px -2px rgba(0,0,0,.12) !important;
        }
        .input-group.input-group--solo {
            background: #fff;
            min-height: 46px;
            border-radius: 2px;
            padding: 0;
            box-shadow: none;
        }
        .pagination__item,
        .pagination__navigation {
            box-shadow: none !important;
        }
        .application--light .pagination__item--active {
            background: #ff8400 !important;
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
