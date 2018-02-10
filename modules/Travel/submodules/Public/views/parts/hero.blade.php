<section id="hero">
    <v-parallax height="650" class="hidden-md-and-down" src="{{ $page->feature }}">
        <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
        <v-toolbar class="elevation-0 transparent" dark>
            <a href=""><img class="pt-5" src="{{ assets('frontier/images/public/exph_logo.png') }}" alt="" width="280"></a>
            @include("Public::parts.hero-nav")
        </v-toolbar>

        {{-- {{ settings('site_title', 'home') }} --}}
        <v-layout row wrap align-center justify-center class="white--text">
            <v-flex md6 xs12>
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center uppercase"><strong>{!! settings('home_banner_title') !!}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{!! settings('home_banner_subtitle') !!}</h5>

<<<<<<< HEAD
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
            </v-flex>
=======
                <div class="hidden-sm-and-down">
                    <v-menu
                        offset-y
                        :close-on-content-click="false"
                        class="block px-3 pt-4 hero-search"
                        v-model="hero.search"
                        >
                        <v-text-field
                            append-icon=""
                            autocomplete
                            clearable
                            label="What do you want to experience?"
                            prepend-icon="search"
                            search-input
                            slot="activator"
                            solo tags
                            v-model="hero.smartSearch.model"
                            @input="smartSearch($event)"
                            >
                        </v-text-field>
                        <v-card class="pa-3" style="max-width: 745px !important;">
                            <v-container fluid grid-list-lg>
                                <v-layout row wrap>
                                    <v-flex xs6 sm3 v-for="(card, i) in ssrch" :key="i">
                                        <a ripple :href="route(urls.experiences.show, card.code)" class="td-n">
                                            <v-card class="elevation-1">
                                                <v-card-media :src="card.feature" width="100%" height="120">
                                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
                                                    <v-card-text>
                                                        <v-container fill-height fluid class="pa-0 white--text">
                                                            <v-layout row wrap align-center justify-center>
                                                            <v-card class="elevation-0 transparent text-xs-center">
                                                               <div class="caption white--text text-xs-center">@{{ card.name }}</div>
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
>>>>>>> 765e0737b3c2314bdda844db6250d0c379f8e322
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

        <v-layout row wrap align-center justify-center class="white--text">
            <v-flex md6 xs12>
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{!! settings('home_banner_title') !!}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{!! settings('home_banner_subtitle') !!}</h5>
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
            </v-flex>
        </v-layout>
    </v-parallax>

    <v-card-text class="white elevation-1 text-xs-center hidden-xs-only">
        <v-layout row wrap>
            <v-flex lg10 offset-lg1 md12 xs12>
                <v-layout row wrap>
                    <v-flex sm4>
                        <v-card-actions class="px-3">
                            <v-avatar size="60">
                                <img src="{{ assets('frontier/images/public/hero-icon.png') }}" alt="" style="width: 60px !important;">
                            </v-avatar>
                            <span><strong>Try An Experience.</strong> Discover over 150 new and exciting experiences around the 81 provinces in the Philippines.</span>
                        </v-card-actions>
                    </v-flex>
                    <v-flex sm4>
                        <v-card-actions class="px-3">
                            <v-avatar tile size="40">
                                <img src="{{ assets('frontier/images/public/faq.png') }}" alt="" style="width: 40px !important;">
                            </v-avatar>
                            <span><strong>Join A  Random Road Trip.</strong> Experience a different way of travel where the destination is a secret and the activities a surprise.</span>
                        </v-card-actions>
                    </v-flex>
                    <v-flex sm4>
                        <v-card-actions class="px-3">
                            <v-avatar tile size="40">
                                <img src="{{ assets('frontier/images/public/giftbox.png') }}" alt="" style="width: 40px !important;">
                            </v-avatar>
                            <span><strong>Book A Surprise.</strong> We plan your trip. The catch? We won't tell you where you are going. Receive a mystery package from us.</span>
                        </v-card-actions>
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
        .uppercase {
            text-transform: uppercase;;
        }
    </style>
@endpush

@push('pre-scripts')
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    ssrch: [],
                    urls: {
                        experiences: {
                            show: '{{ route('experiences.show', 'null') }}',
                        }
                    },
                    hero: {
                        search: false,
                        smartSearch: {
                            model: '',
                        }
                    }
                }
            },

            methods: {
                smartSearch(e) {
                    let query = {
                            descending: 'false',
                            page: 1,
                            q: this.hero.smartSearch.model,
                            sort: 'id',
                            take: 8,
                        };

                    this.api().search('{{ route('api.experiences.search') }}', query)
                        .then((data) => {
                            this.ssrch = data.items.data;
                        });
                }
            },
            mounted () {
                let query = {
                        descending: 'false',
                        page: 1,
                        sort: 'id',
                        take: 8,
                    };
                this.api().get('{{ route('api.experiences.all') }}', query)
                    .then((data) => {
                        this.ssrch = data.items.data;
                        // console.log("GET",data)
                    });
            }
        });
    </script>
@endpush
