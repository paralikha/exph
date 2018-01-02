@extends("Theme::layouts.auth")

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            {{-- @include("Public::sections.nav") --}}
            @include("Theme::partials.navigation")
        </v-toolbar>
        <v-divider></v-divider>
        <v-card-text class="pa-0">
            <v-menu
                origin="center center"
                transition="scale-transition"
                offset-y
                class="elevation-0 hidden-sm-and-down"
                >
                <v-btn flat class="grey--text text--darken-1" slot="activator">
                    {{ __('Dates') }}
                </v-btn>
                <v-card class="elevation-0 hidden-sm-and-down">
                    <v-card-text class="hidden-sm-and-down">
                        <v-layout row wrap grid-list-lg>
                            <v-flex xs6>
                                <v-card-text class="pb-0 hidden-sm-and-down">
                                    <v-date-picker class="elevation-0 hidden-sm-and-down" no-title v-model="from" portrait></v-date-picker>
                                </v-card-text>
                            </v-flex>
                            <v-flex xs6>
                                <v-card-text class="pb-0 hidden-sm-and-down">
                                    <v-date-picker class="elevation-0 hidden-sm-and-down" no-title v-model="from" portrait></v-date-picker>
                                </v-card-text>
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn flat class="grey--text">Cancel</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn flat primary>Apply</v-btn>
                    </v-card-actions>
                </v-card>
            </v-menu>
            {{-- dialog on sm-viewport --}}
            <v-dialog class="hidden-md-and-up" v-model="dialog.calendar" fullscreen transition="dialog-bottom-transition" :overlay=false>
                <v-btn flat class="grey--text text--darken-1" slot="activator">
                    {{ __('Dates') }}
                </v-btn>
                <v-card>
                    <v-toolbar light class="white elevation-0">
                        <v-btn icon @click.native="dialog.calendar = false">
                            <v-icon>close</v-icon>
                        </v-btn>
                        <v-toolbar-title>When</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <v-btn dark flat @click.native="dialog.calendar = false">Reset</v-btn>
                        </v-toolbar-items>
                    </v-toolbar>
                    <v-divider></v-divider>
                    <v-flex xs12>
                        <v-card-text class="pb-0">
                            <v-date-picker class="elevation-0 calendar" no-title v-model="from" landscape></v-date-picker>
                        </v-card-text>
                    </v-flex>
                    <v-flex xs12>
                        <v-card-text class="pb-0 ">
                            <v-date-picker class="elevation-0 calendar" no-title v-model="from" landscape></v-date-picker>
                        </v-card-text>
                    </v-flex>
                </v-card>
            </v-dialog>

            <v-menu
                origin="center center"
                transition="scale-transition"
                offset-y center
                class="elevation-0"
                :nudge-width="150"
                >
                <v-btn class="grey--text text--darken-1" flat slot="activator">All Types <v-icon>keyboard_arrow_down</v-icon></v-btn>
                <v-list>
                    <v-list-tile ripple avatar v-for="item in items" v-bind:key="item.title" @click="">
                        <v-list-tile-action>
                            <v-icon color="pink">whatshot</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title v-text="item.title"></v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-card-text>
    </v-card>

    <v-card class="banner elevation-1">
        <v-parallax class="elevation-0" height="450" src="{{ assets('frontier/images/public/sierra.jpg') }}">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("ROADTRIPS") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{__("A Road Trip For The Adventure Seekers")}}</h5>
            </v-layout>
        </v-parallax>
    </v-card>

    <section id="experiences" class="py-5">
        <v-container fluid grid-list-lg>
            <v-layout row wrap align-center justify-center>
                <v-flex lg10 xs12>
                    {{-- <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("CHOOSE A ROADTRIP") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">
                            {{ __("Discover more about yourself, about others and about the beautiful country called the Philippines. Book your Experience with us now.") }}
                        </h2>
                    </v-card-text> --}}
                    {{-- <v-layout row wrap align-center>
                        <v-flex xs12 sm4 md3 v-for="card in experiences">
                            <a href="roadtrips/show" ripple class="td-n">
                                <v-card class="elevation-1 c-lift">
                                    <v-card-media
                                        height="180px"
                                        :src="card.src"
                                        class="grey lighten-4">
                                        <div class="text-xs-right" style="width: 100%;">
                                            <v-btn large v-tooltip:left="{ html: 'Add to wishlist' }" icon class="mr-3">
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
                    </v-card-text> --}}


                    <v-layout row wrap>
                        <v-flex xs12 sm6 offset-sm3>
                            <v-card class="elevation-0 transparent" height="400px">
                                <v-card-text class="text-xs-center my-3">
                                    <img src="{{ assets('frontier/images/public/sad.png') }}" alt="" height="80" class="mb-3">
                                    <h2 class="subheading grey--text">
                                        {{ __("No Roadtrips found with those parameters.") }}
                                    </h2>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    {{-- <section id="why" class="white">
        <v-container fluid class="pa-0">
            <v-layout row wrap align-center justify-center>
                <v-flex lg8 md10 sm12 xs12>
                    <div class="text-xs-center py-5 px-3">
                        <h2 class="display-1">{{ __("WHY JOIN US") }}</h2>
                        <h2 class="subheading grey--text text--darken-1" style="line-height: 1.5;">
                        {{ __("Random Road Trips is the unique and out of the box travel concept that Experience Philippines pioneered. It is for the risk takers who want to let go of control. It is for the adventurers who want the thrill of the unknown. It is for the traveler who wants to let go of expectations. But, most of all, it is for the seeking magic on the other side of fear.") }}
                        </h2>
                    </div>
                </v-flex>
            </v-layout>
            <v-layout row wrap align-center>
                <v-flex xs12
                    v-bind="{ [`md${card.flex}`]: true }"
                    v-for="card in whys"
                    :key="card.title"
                    >
                    <v-card dark class="elevation-0 content">
                        <v-card-media
                            :src="card.src"
                            height="250px"
                            >
                            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                            <div class="content-overlay"></div>
                            <v-container fill-height fluid class="pa-0 white--text">
                                <v-layout row wrap align-end justify-bottom>
                                    <v-card class="elevation-0 transparent content-title">
                                        <v-card-text>
                                            <h5 class="white--text fw-500 text-xs-center">@{{ card.title }}</h5>
                                        </v-card-text>
                                    </v-card>
                                </v-layout>
                            </v-container>
                            <div class="content-details fadeIn-top">
                                <p class="subheading">@{{ card.caption }}</p>
                            </div>
                        </v-card-media>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </section> --}}

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
                        { title: 'Nature' },
                        { title: 'Adventure' },
                        { title: 'Sports' },
                        { title: 'Heritage' },
                        { title: 'Business' },
                        { title: 'Entertainment' },
                        { title: 'Skills' },
                        { title: 'Food' },
                        { title: 'Outreach' }
                    ],
                    from: null,
                    dialog: {
                        calendar: false
                    },
                    to: null,
                    menu: false,
                    whys: [
                        {
                            title: 'The Destination Is A Secret',
                            caption: 'We view travel as an experience. We focus on experience over the destination. Most travelers are familiar with the common and popular, but we will take you to the off-the-beaten path, to those secret places that we have found in our travels.',
                            src: '{{ assets('frontier/images/public/el_capitan.jpg') }}',
                            flex: 8,
                            height: '100%'
                        },
                        {
                            title: 'Step Out Of Your Comfort Zone',
                            caption: 'Challenge yourself. Do what you never thought you could do. It is one of the most rewarding feeling ever. Trust us on that!',
                            src: '{{ assets('frontier/images/public/r1.jpg') }}',
                            flex: 4
                        },
                        {
                            title: 'Travel With People You Don’t Know',
                            caption: 'The most memorable connections are often made with like-minded people, and, when all of you are strangers in new places, you get to make even deeper friendships.',
                            src: '{{ assets('frontier/images/public/alabama.jpg') }}',
                            flex: 3
                        },
                        {
                            title: 'The Activities A Surprise',
                            caption: 'Sometimes we will take you swimming beneath majestic waterfalls, or we will hike through lush forests, and we will even encourage you to do cliff diving. But, whatever it may be, we will guarantee you will have lots of fun.',
                            src: '{{ assets('frontier/images/public/r3.jpg') }}',
                            flex: 6
                        },
                        {
                            title: 'Take A Leap Of Faith',
                            caption: 'Join the more than 600 people who have already “survived” one of our Random Road Trips. It is one of the best experiences you can give yourself.',
                            src: '{{ assets('frontier/images/public/h7.jpg') }}',
                            flex: 3
                        },
                    ],
                    experiences: [
                        {
                            title: 'Random Road Trip #1',
                            price: '₱ 6,000',
                            category: 'Random Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/placeholder/windmill.jpg') }}'
                        },
                        {
                            title: 'Random Road Trip #2',
                            price: '₱ 10,000',
                            category: 'Random Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/placeholder/red2.jpg') }}'
                        },
                        {
                            title: 'Random Road Trip #3',
                            price: '₱ 13,000',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/city.png') }}'
                        },
                        {
                            title: 'Random Road Trip #4',
                            price: '₱ 4,000',
                            category: 'Random Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/placeholder/9.png') }}'
                        },
                        {
                            title: 'Random Road Trip #5',
                            price: '₱ 4,000',
                            category: 'Random Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/placeholder/9.jpg') }}'
                        },
                        {
                            title: 'Random Road Trip #6',
                            price: '₱ 6,000',
                            category: 'Random Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/placeholder/13.jpg') }}'
                        },
                        {
                            title: 'Random Road Trip #7',
                            price: '₱ 10,000',
                            category: 'Random Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/placeholder/red.jpg') }}'
                        },
                        {
                            title: 'Random Road Trip #8',
                            price: '₱ 13,000',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/8.jpg') }}'
                        }
                    ],
                }
            },
        });
    </script>
@endpush


