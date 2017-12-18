{{--
Template Name: Partnership Template
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

    <v-card class="elevation-1 hero">
        <v-parallax src="{{ assets('frontier/images/placeholder/9.png') }}" height="450">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("CORPORATE PARTNERSHIPS") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{__("Experience Philippines is all about collaboration and partnerships. ")}}</h5>
            </v-layout>
        </v-parallax>
    </v-card>

    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg8 md10 xs12>
                <v-card-text class="text-xs-center my-3">
                    <h2 class="display-1">{{ __("We Work Together With These Companies") }}</h2>
                    <h2 class="subheading grey--text text--darken-1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi deserunt numquam amet, accusamus
                    </h2>
                </v-card-text>
            </v-flex>
        </v-layout>
    </v-container>

    <section id="1" class="py-3">
        <v-layout row wrap align-center justify-center>
            <v-flex md6 xs12>
                <v-card class="elevation-1">
                    <v-card-media src="{{ assets('frontier/images/public/car.jpg') }}" height="450px"></v-card-media>
                </v-card>
            </v-flex>
            <v-flex md4 xs12>
                <v-card class="elevation-1 hidden-sm-and-down" style="margin-left: -80px;">
                    <v-card-text class="pa-4">
                        <h5 class="primary--text"><strong>BLOC Campsite</strong></h5>
                        <p>The BLOC Campsite is unique glamping campsite created by the founders of the BLOC Architectural firm. They are the one behind the award-winning Invention, the Modular Impermanent Building System.</p>
                        <p>They believe that the BLOC Technology is a God-given-gift and it is only entrusted to us by God to serve as our enabling tool to fulfill the Mission He gave us. The Mission is to innovatively eradicate “homelessness” thru the BLOC Revolution.</p>
                        <p>BLOC Revolution is a Mission-in-Action to bring about a radical change in the way humankind dwells here on Earth.</p>
                    </v-card-text>
                </v-card>
                <v-card class="elevation-1 hidden-md-and-up">
                    <v-card-text class="pa-4">
                        <h5 class="primary--text"><strong>BLOC Campsite</strong></h5>
                        <p>The BLOC Campsite is unique glamping campsite created by the founders of the BLOC Architectural firm. They are the one behind the award-winning Invention, the Modular Impermanent Building System.</p>
                        <p>They believe that the BLOC Technology is a God-given-gift and it is only entrusted to us by God to serve as our enabling tool to fulfill the Mission He gave us. The Mission is to innovatively eradicate “homelessness” thru the BLOC Revolution.</p>
                        <p>BLOC Revolution is a Mission-in-Action to bring about a radical change in the way humankind dwells here on Earth.</p>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </section>

    <section id="2" class="py-3">
        <v-layout row wrap align-center justify-center>
            <v-flex md4 xs12>
                <v-card class="elevation-1 hidden-sm-and-down" style="margin-left: -80px;">
                    <v-card-text class="pa-4">
                        <h5 class="primary--text"><strong>BLOC Campsite</strong></h5>
                        <p>The BLOC Campsite is unique glamping campsite created by the founders of the BLOC Architectural firm. They are the one behind the award-winning Invention, the Modular Impermanent Building System.</p>
                        <p>They believe that the BLOC Technology is a God-given-gift and it is only entrusted to us by God to serve as our enabling tool to fulfill the Mission He gave us. The Mission is to innovatively eradicate “homelessness” thru the BLOC Revolution.</p>
                        <p>BLOC Revolution is a Mission-in-Action to bring about a radical change in the way humankind dwells here on Earth.</p>
                    </v-card-text>
                </v-card>
                <v-card class="elevation-1 hidden-md-and-up">
                    <v-card-text class="pa-4">
                        <h5 class="primary--text"><strong>BLOC Campsite</strong></h5>
                        <p>The BLOC Campsite is unique glamping campsite created by the founders of the BLOC Architectural firm. They are the one behind the award-winning Invention, the Modular Impermanent Building System.</p>
                        <p>They believe that the BLOC Technology is a God-given-gift and it is only entrusted to us by God to serve as our enabling tool to fulfill the Mission He gave us. The Mission is to innovatively eradicate “homelessness” thru the BLOC Revolution.</p>
                        <p>BLOC Revolution is a Mission-in-Action to bring about a radical change in the way humankind dwells here on Earth.</p>
                    </v-card-text>
                </v-card>
            </v-flex>
             <v-flex md6 xs12>
                <v-card class="elevation-1">
                    <v-card-media src="{{ assets('frontier/images/public/v2.jpg') }}" height="450px"></v-card-media>
                </v-card>
            </v-flex>
        </v-layout>
    </section>

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

            },
        });
    </script>
@endpush
