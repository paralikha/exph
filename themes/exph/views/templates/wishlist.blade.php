{{--
Template Name: Wishlist Template
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
            <v-flex lg10 md12 xs12>
                <v-layout row wrap>
                    <v-flex md3 sm4 xs12>
                        <v-card class="elevation-1">
                            <v-list class="py-0">
                                <v-list-tile ripple href="\notifications">
                                    <v-list-tile-action>
                                        <v-icon>notifications</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{ __('Notifications') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile ripple href="\transactions">
                                    <v-list-tile-action>
                                        <v-icon>credit_card</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{ __('Transaction History') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile ripple href="\wishlist">
                                    <v-list-tile-action>
                                        <v-icon primary>favorite</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="primary--text">
                                            {{ __('Wishlist') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-flex>

                    <v-flex md9 sm8 xs12>
                        <v-toolbar dark class="blue elevation-1">
                            <v-toolbar-title>Wishlists</v-toolbar-title>
                            <v-spacer></v-spacer>

                            <v-btn icon v-tooltip:left="{ 'html': 'Search' }"><v-icon>search</v-btn>
                            <v-btn icon v-tooltip:left="{ 'html': 'Filter' }"><v-icon>fa fa-filter</v-btn>
                        </v-toolbar>
                        <v-container fluid grid-list-lg>
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-layout row wrap>
                                        <v-flex xs12 sm6 md4 v-for="card in experiences">
                                            <a href="experiences/show" ripple class="td-n">
                                                <v-card class="elevation-1 c-lift">
                                                    <v-card-media
                                                        height="180px"
                                                        :src="card.src"
                                                        class="grey lighten-4">
                                                        <div class="text-xs-right" style="width: 100%;">
                                                            <v-btn large v-tooltip:left="{ html: 'Remove from wishlist' }" icon class="mr-3">
                                                                @include("Experience::components.wishlisted")
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
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    @include("Public::sections.footer")
@endsection





@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    n1: null,
                    n2: null,
                    n3: null,
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

