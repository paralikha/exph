<section id="hero">
    <v-parallax height="650" class="hidden-md-and-down" src="{{ assets('frontier/images/public/car.jpg') }}">
        <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
        <v-toolbar class="elevation-0 transparent" dark>
            <a href="">
                <img class="pt-5" src="{{ assets('frontier/images/public/exph_logo.png') }}" alt="" width="280">
            </a>
            @include("Public::parts.hero-nav")
        </v-toolbar>

        <v-layout column align-center justify-center class="white--text">
            <v-card dark class="elevation-0 transparent">
                <h2 class="mb-2 text-xs-center"><strong>{{ __("LET'S GO TRAVEL DIFFERENTLY") }}</strong></h2>
                <h5 class="mb-3 text-xs-center fw-500">We are an experienced based company that lets you choose your own <br> bucketlist adventure in the Philippines.</h5>
                <div class="hidden-sm-and-down">
                    <v-menu
                        offset-y
                        :close-on-content-click="false"
                        class="block px-3 pt-4 hero-search"
                        v-model="hero.search"
                        >
                        <v-select
                            autocomplete
                            label="What do you want to experience?"
                            slot="activator"
                            append-icon=""
                            prepend-icon="search"
                            clearable
                            search-input
                             solo tags>
                        </v-select>
                        <v-card class="pa-3" style="max-width: 745px !important;">
                            <v-container fluid grid-list-lg>
                                <v-layout row wrap>
                                    <v-flex xs6 sm3 v-for="card in ssrch">
                                        <a href="" class="td-n">
                                            <v-card class="elevation-1">
                                                <v-card-media :src="card.src" width="100%" height="120">
                                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
                                                    <v-card-text>
                                                        <v-container fill-height fluid class="pa-0 white--text">
                                                            <v-layout row wrap align-center justify-center>
                                                            <v-card class="elevation-0 transparent text-xs-center">
                                                               <div class="caption white--text text-xs-center">@{{ card.title }}</div>
                                                            </v-card>
                                                            </v-layout>
                                                        </v-container>
                                                    </v-card-text>
                                                </v-card-media>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-menu>
                </div>
            </v-card>
        </v-layout>
    </v-parallax>

    <v-parallax height="400" class="hidden-lg-and-up" src="{{ assets('frontier/images/public/car.jpg') }}">
        <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
        <v-toolbar class="elevation-0 transparent" dark>
            <a href="">
                <img class="pt-3" src="{{ assets('frontier/images/public/exph_logo.png') }}" alt="" width="200">
            </a>
            @include("Public::parts.hero-nav")
            {{-- @include("Theme::partials.navigation") --}}
        </v-toolbar>

        <v-layout column align-center justify-center class="white--text">
            <v-card dark class="elevation-0 transparent">
                <h2 class="mb-2 text-xs-center"><strong>{{ __("LET'S GO TRAVEL DIFFERENTLY") }}</strong></h2>
                <h5 class="mb-3 text-xs-center fw-500">We are an experienced based company that lets you choose your own <br> bucketlist adventure in the Philippines.</h5>
                <div class="hidden-sm-and-down">
                    <v-menu
                        offset-y
                        :close-on-content-click="false"
                        class="block px-3 pt-4"
                        v-model="search"
                        >
                        <v-select
                            autocomplete
                            label="What do you want to experience?"
                            slot="activator"
                            append-icon=""
                            prepend-icon="search"
                            clearable
                            search-input
                             solo tags>
                        </v-select>
                        <v-card class="pa-3" style="max-width: 745px !important;">
                            <v-container fluid grid-list-lg>
                                <v-layout row wrap>
                                    <v-flex xs6 sm3 v-for="card in ssrch">
                                        <a href="" class="td-n">
                                            <v-card class="elevation-1">
                                                <v-card-media :src="card.src" width="100%" height="120">
                                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
                                                    <v-card-text>
                                                        <v-container fill-height fluid class="pa-0 white--text">
                                                            <v-layout row wrap align-center justify-center>
                                                            <v-card class="elevation-0 transparent text-xs-center">
                                                               <div class="caption white--text text-xs-center">@{{ card.title }}</div>
                                                            </v-card>
                                                            </v-layout>
                                                        </v-container>
                                                    </v-card-text>
                                                </v-card-media>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-menu>
                </div>
            </v-card>
        </v-layout>
    </v-parallax>
    <v-card-text class="white elevation-1 text-xs-center hidden-xs-only">
        <v-layout row wrap>
            <v-flex lg10 offset-lg1 md12 xs12>
                <v-layout row wrap>
                    <v-flex sm4>
                        <v-list two-line subheader>
                            <v-list-tile avatar>
                                <v-list-tile-avatar tile>
                                    <img class="td-n" src="{{ assets('frontier/images/public/hero-icon.png') }}" alt="">
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Try An Experience</v-list-tile-title>
                                    <v-list-tile-sub-title>Discover over 150 new and exciting experiences around the 81 provinces in the Philippines.</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-flex>
                    <v-flex sm4>
                        <v-list two-line subheader>
                            <v-list-tile avatar>
                                <v-list-tile-avatar tile>
                                    <img src="{{ assets('frontier/images/public/faq.png') }}" alt="">
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Join A  Random Road Trip</v-list-tile-title>
                                    <v-list-tile-sub-title>Experience a different way of travel where the destination is a secret and the activities a surprise.</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-flex>
                    <v-flex sm4>
                        <v-list two-line subheader>
                            <v-list-tile avatar>
                                <v-list-tile-avatar tile>
                                    <img src="{{ assets('frontier/images/public/giftbox.png') }}" alt="">
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Book A Suprise</v-list-tile-title>
                                    <v-list-tile-sub-title>We plan your trip. The catch? We won't tell you where you are going. Receive a mystery package from us.</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-card-text>
</section>

@push('css')
    <style>
        .hero-search .input-group.input-group--solo {
            min-height: 55px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
        }
        #hero .parallax__content {
            padding: 0;
        }
        .hero-search .input-group.input-group--solo label {
            top: 12px !important;
        }
    </style>
@endpush

@push('pre-scripts')
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    ssrch: [
                        {
                            title: 'FULL MOON PARTY Luna Sea: A Random Full Moon Party #4',
                            price: '₱ 6,000',
                            category: 'Retro Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/placeholder/windmill.jpg') }}'
                        },
                        {
                            title: 'Retro Road Trip #2',
                            price: '₱ 10,000',
                            category: 'Singles Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/placeholder/red2.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 13,000',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/city.png') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 4,000',
                            category: 'Special Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/placeholder/9.png') }}'
                        },
                        {
                            title: 'FULL MOON PARTY Luna Sea: A Random Full Moon Party #4',
                            price: '₱ 6,000',
                            category: 'Retro Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/placeholder/9.jpg') }}'
                        },
                        {
                            title: 'Retro Road Trip #2',
                            price: '₱ 10,000',
                            category: 'Singles Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/placeholder/13.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 13,000',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/red.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 4,000',
                            category: 'Special Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/placeholder/8.jpg') }}'
                        },
                    ],
                    hero: {
                        search: false,
                    }
                }
            },
        });
    </script>
@endpush
