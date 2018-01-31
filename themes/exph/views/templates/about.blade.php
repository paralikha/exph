{{--
Template Name: About Template
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
            @include("Theme::partials.navigation")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1 hero">
        <v-parallax src="{{ $page->feature }}" height="450">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="text-xs-center elevation-0 transparent">
                    <h3 class="mb-3 fw-500">{!! $page->body !!}</h3>
                </v-card>
            </v-layout>
        </v-parallax>
        <v-card-text class="pa-2 white hidden-xs-only">
            <v-layout wrap justify-space-around align-center>
                <v-list class="text-xs-center">
                    <div class="headline primary--text text--darken-2">465</div>
                    <div class="mt-2 caption">{{ __('Happy Travellers') }}</div>
                </v-list>
                <v-list class="text-xs-center">
                    <div class="headline primary--text text--darken-2">125</div>
                    <div class="mt-2 caption">{{ __('Amazing Experiences') }}</div>
                </v-list>
                <v-list class="text-xs-center">
                    <div class="headline primary--text text--darken-2">19, 172</div>
                    <div class="mt-2 caption">{{ __('Die Hard Fans') }}</div>
                </v-list>
                <v-list class="text-xs-center">
                    <div class="headline primary--text text--darken-2">130</div>
                    <div class="mt-2 caption">{{ __('Destinations Explored') }}</div>
                </v-list>
            </v-layout>
        </v-card-text>
    </v-card>

    {{-- <section id="gallery" class="my-5">
        <v-container fluid>
            <v-layout row wrap justify-center align-center>
                <v-flex lg10 xs12>
                    <v-layout row wrap>
                        <v-flex md6 xs12>
                            <v-card class="elevation-1" height="100%">
                                <v-card-text>
                                    <h5>Test-text</h5>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                        <v-flex md6 xs12>
                            <v-card dark class="elevation-1" height="100%">
                                <v-carousel hide-delimiters hide-controls style="height: 500px;">
                                <v-carousel-item v-for="(item,i) in gallery" v-bind:src="item.src" :key="i"></v-carousel-item>
                            </v-carousel>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section> --}}

    <section id="ms" class="white py-5">
        <v-container fluid>
            <v-layout row wrap justify-center align-top>
                <v-flex md8 xs12>
                    <v-layout row wrap justify-center align-center>
                        <v-flex sm6 xs12 order-lg1 order-md1 order-sm1 order-xs2>
                            <div class="text-xs-center">
                                <img src="{{ assets('frontier/images/placeholder/pack.jpg') }}" width="100%" style="max-width: 400px;">
                            </div>
                        </v-flex>

                        <v-flex sm6 xs12 order-lg2 order-md2 order-sm2 order-xs1>
                            <v-card class="elevation-0" height="100%">
                                <div class="subheading">
                                    <h2 class="display-1 mb-3">{{ __("Mission Statement") }}</h2>
                                    <p class="headline">“ We want you to experience and explore the beauty and charm of the Philippines Islands in a different way by travelling differently. ”</p>
                                </div>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    <section id="vs" class="white pb-5">
        <v-container fluid>
            <v-layout row wrap justify-center align-top>
                <v-flex md8 xs12>
                    <v-layout row wrap justify-center align-center>
                        <v-flex sm6 xs12>
                            <v-card class="elevation-0" height="100%">
                                <div class="subheading">
                                    <h2 class="display-1">{{ __("Vision") }}</h2>
                                    <v-card-actions class="mb-3">
                                        <v-avatar>
                                            <v-icon class="display-1 red--text text--lighten-1">terrain</v-icon>
                                        </v-avatar>
                                        <p>To provide <strong>unique adventures</strong> of places in the Philippines not frequently visited by foreign and local tourists.</p>
                                    </v-card-actions>
                                    <v-card-actions class="mb-3">
                                        <v-avatar>
                                            <v-icon class="display-1 red--text text--lighten-1">directions_car</v-icon>
                                        </v-avatar>
                                        <p>To provide an alternative transport and lodging solution.</p>
                                    </v-card-actions>
                                    <v-card-actions class="mb-3">
                                        <v-avatar>
                                            <v-icon class="display-1 red--text text--lighten-1">place</v-icon>
                                        </v-avatar>
                                        <p>To introduce a different kind of travel experience classified as either fixed itineraries or random road trips.</p>
                                    </v-card-actions>
                                    <v-card-actions class="mb-3">
                                        <v-avatar>
                                            <v-icon class="display-1 red--text text--lighten-1">zoom_out_map</v-icon>
                                        </v-avatar>
                                        <p>To encourage individuals to experiment and experience unplanned journeys by moving them out of their comfort zones through random road trips with random people to random places for some random fun and adventure.</p>
                                    </v-card-actions>
                                </div>
                            </v-card>
                        </v-flex>

                        <v-flex sm6 xs12>
                            <v-card-text class="text-xs-center">
                                <img src="{{ assets('frontier/images/placeholder/pack.jpg') }}" width="100%" style="max-width: 400px;">
                            </v-card-text>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

   {{--  <section id="gallery" class="my-5">
        <v-container fluid>
            <v-layout row wrap justify-center align-center>
                <v-flex lg10 xs12>
                    <v-layout row wrap>
                        <v-flex md6 xs12>
                            <v-card dark class="elevation-1" height="100%">
                                <v-carousel hide-delimiters hide-controls style="height: 500px;">
                                <v-carousel-item v-for="(item,i) in gallery" v-bind:src="item.src" :key="i"></v-carousel-item>
                            </v-carousel>
                            </v-card>
                        </v-flex>
                        <v-flex md6 xs12>
                            <v-card class="elevation-1" height="100%">
                                <v-card-text>
                                    <h5>Test-text</h5>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section> --}}

    <section id="services" class=" mt-5 py-5">
        <v-container fluid grid-list-lg>
            <v-layout row wrap justify-center align-top>
                <v-flex md8 xs12>
                    <div class="text-xs-center">
                        <h2 class="display-1">{{ __('Services') }}</h1>
                    </div>
                    <v-layout row wrap>
                        <v-flex md4 sm4 xs12>
                            <v-card class="transparent elevation-0">
                                <v-card-text class="text-xs-center">
                                    <p class="mb-4">
                                        <v-avatar tile size="60px">
                                            <img src="{{ assets('frontier/images/public/favorite_place.png') }}" alt="">
                                        </v-avatar>
                                    </p>
                                    <p class="subheading fw-500">Experience Local</p>
                                    <p>Our trips are all about local experiences. We just do not see beautiful sites but we learn for them.</p>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                        <v-flex md4 sm4 xs12>
                            <v-card class="transparent elevation-0">
                                <v-card-text class="text-xs-center">
                                    <p class="mb-4">
                                        <v-avatar tile size="60px">
                                            <img src="{{ assets('frontier/images/public/sunbed.png') }}" alt="">
                                        </v-avatar>
                                    </p>
                                    <p class="subheading fw-500">Philippine Class Service</p>
                                    <p>In the Philippines, we put great importance in hospitality. Our road trips  are always cheerful and with a smile.</p>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                        <v-flex md4 sm4 xs12>
                            <v-card class="transparent elevation-0">
                                <v-card-text class="text-xs-center">
                                    <p class="mb-4">
                                        <v-avatar tile size="60px">
                                            <img src="{{ assets('frontier/images/public/budget.png') }}" alt="">
                                        </v-avatar>
                                    </p>
                                    <p class="subheading fw-500">Best Price Guarantee</p>
                                    <p>We provide the best value for money for Philippine budget travel.</p>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    @include("Public::sections.footer")
@endsection

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ assets('frontier/slick/slick/slick-theme.css') }}">
    <style>
        .hero .parallax__content {
            padding: 0;
        }

        .review--flex {
            margin-top: -100px;
        }

        .rounded {
            border-radius: 50% !important;
        }

        .fw-400 {
            font-weight: 400;
        }

        .fw-500 {
            font-weight: 500;
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
    </style>
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    menu: false,
                    search: null,
                    gallery: [
                        {
                            src: '{{ assets('frontier/images/placeholder/city.png') }}'
                        },
                        {
                            src: '{{ assets('frontier/images/placeholder/8.jpg') }}'
                        },
                        {
                            src: '{{ assets('frontier/images/placeholder/city.jpg') }}'
                        }
                    ]
                }
            },
        });
    </script>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{ assets('frontier/slick/slick/slick.js') }}"></script>
    <script>
        $(window).scroll(function () {
            if ( $(this).scrollTop() > 600 && !$('header').hasClass('open') ) {
                $('header').addClass('open');
                $('header').slideDown(200);
            } else if ( $(this).scrollTop() <= 600 ) {
                $('header').removeClass('open');
                $('header').slideUp(200);
            }
        });
        $(document).on('ready', function() {
            $(".regular").slick({
                dots: false,
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endpush

