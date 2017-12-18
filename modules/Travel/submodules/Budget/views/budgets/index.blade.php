{{--
Template Name: Pack and Go Template
Description: A page for all experiences.
Author: Princess Ellen Alto
Version: 1.0
--}}


@extends("Theme::layouts.auth")

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
        <v-divider></v-divider>
    </v-card>

    <v-card class="banner elevation-1">
        <v-parallax class="elevation-0" height="450" src="{{ assets('frontier/images/public/sierra.jpg') }}">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("PACK UP AND GO") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{__("3-day weekend trip! Select your mode of transportation + budget.")}}</h5>
            </v-layout>
        </v-parallax>
    </v-card>

    <section id="budgets" class="py-5">
        <v-container fluid grid-list-lg>
            <v-layout row wrap align-center justify-center>
                <v-flex lg10 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("CHOOSE A 3-DAY GETAWAY") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">
                            {{ __("Discover more about yourself, about others and about the beautiful country called the Philippines. Book your Experience with us now.") }}
                        </h2>
                    </v-card-text>
                    <v-layout row wrap align-center>
                        <v-flex xs12 sm4 md3 v-for="card in budgets">
                            <a href="budgets/show" ripple class="td-n">
                                <v-card class="elevation-1 c-lift">
                                    <v-card-media
                                        height="180px"
                                        :src="card.src"
                                        class="grey lighten-4">
                                        <div class="text-xs-right" style="width: 100%;">
                                            <v-btn v-tooltip:left="{ html: 'Add to wishlist' }" large icon class="mr-3">
                                                @include("Experience::components.wishlist")
                                            </v-btn>
                                            <v-chip label class="ma-0 white--text green lighten-1" v-html="card.price" style="position: absolute; bottom: 15px; right: 0;"></v-chip>
                                        </div>
                                    </v-card-media>
                                    <v-divider class="grey lighten-3"></v-divider>
                                    <v-toolbar card dense class="transparent pt-2">
                                        <v-toolbar-title class="mr-3 subheading">
                                            <span class="body-2">@{{ card.title }}</span><br>
                                            <span class="caption">@{{ card.date }}</span><br>
                                        </v-toolbar-title>
                                    </v-toolbar>
                                    <v-card-text class="grey--text pt-4">
                                        <v-icon class="subheading grey--text text--lighten-1 pb-1">whatshot</v-icon>
                                        <span class="caption">@{{ card.category }}</span>
                                        <div>
                                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                                            <v-icon class="subheading primary--text pb-1">star_half</v-icon>
                                            4.6
                                        </div>
                                    </v-card-text>
                                </v-card>
                            </a>
                        </v-flex>
                    </v-layout>
                    <v-card-text>
                        <div class="text-xs-center">
                            <v-pagination circle :length="15" v-model="page" :total-visible="7" class="caption main-paginate"></v-pagination>
                        </div>
                    </v-card-text>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    @include("Public::sections.footer")
@endsection

@push('css')
    <style>
        .calendar {
            width: 100%;
        }
        .calendar .picker__body {
            margin-left: 0;
        }
        .calendar .picker--date__table table {
            width: 100%;
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
        footer a:hover,
        .social:hover {
            color: #ff6600 !important;
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

        /* hoverlay on whys */
        .content {
            position: relative;
            margin: auto;
            overflow: hidden;
        }

        .content .content-overlay {
            background: rgba(0, 0, 0, 0.7);
            /*background: linear-gradient(to top, rgba(0,0,0,0.65), transparent 100%);*/
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            opacity: 0;
            z-index: 1;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .content:hover .content-overlay {
            opacity: 1;
        }

        .content:hover .content-title {
            opacity: 0;
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            z-index: 2;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }

        .content:hover .content-details {
            top: 50%;
            left: 50%;
            opacity: 1;
        }

        .fadeIn-bottom {
            top: 80%;
        }

        .fadeIn-top {
            top: 20%;
        }
        /**/
    </style>
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    filtercat: null,
                    items: [
                        { title: 'Random' },
                        { title: 'Singles' },
                        { title: 'Random OUTings' },
                        { title: 'Retro' },
                        { title: 'Quick Getaway' },
                        { title: 'Special' },
                    ],
                    e7: [],
                    types: [
                        { title: 'Swim' },
                        { title: 'Dive' },
                        { title: 'Nightlife' },
                        { title: 'Surf' }
                    ],
                    from: null,
                    dialog: {
                        calendar: false
                    },
                    to: null,
                    menu: false,
                    budgets: [
                        {
                            title: 'Multi-Traveler - Plane, Train, or Bus: 3-Day Getaway',
                            price: 'from ₱ 600',
                            category: 'Random Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/placeholder/windmill.jpg') }}'
                        },
                        {
                            title: 'Solo Traveler - Plane, Train, or Bus:   3-Day Getaway',
                            price: 'from ₱ 1,000',
                            category: 'Random Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/placeholder/red2.jpg') }}'
                        },
                        {
                            title: 'Multi-Traveler - Road Trip: 3-Day Getaway',
                            price: 'from ₱ 800',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/city.png') }}'
                        },
                        {
                            title: 'Solo Traveler -  Road Trip: 3-Day Getaway',
                            price: 'from ₱ 1,300',
                            category: 'Random Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/placeholder/9.png') }}'
                        },
                        {
                            title: 'Multi-Traveler - Plane, Train, or Bus: 3-Day Getaway',
                            price: 'from ₱ 600',
                            category: 'Random Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/placeholder/windmill.jpg') }}'
                        },
                        {
                            title: 'Solo Traveler - Plane, Train, or Bus:   3-Day Getaway',
                            price: 'from ₱ 1,000',
                            category: 'Random Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/placeholder/red2.jpg') }}'
                        },
                        {
                            title: 'Multi-Traveler - Road Trip: 3-Day Getaway',
                            price: 'from ₱ 800',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/city.png') }}'
                        },
                        {
                            title: 'Solo Traveler -  Road Trip: 3-Day Getaway',
                            price: 'from ₱ 1,300',
                            category: 'Random Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/placeholder/9.png') }}'
                        },
                    ],
                }
            },
        });
    </script>
@endpush


