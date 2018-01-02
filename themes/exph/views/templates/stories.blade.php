{{--
Template Name: Stories Template
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

    <section id="stories">
        <v-container fluid grid-list-lg>
            <v-layout row wrap align-top justify-center>
                <v-flex lg9 md10 sm12 xs12>
                    <v-layout row wrap align-top justify-center>
                        <v-flex md8 xs12>
                            <v-card class="elevation-1 mb-3 hidden-md-and-up">
                                <v-select
                                    autocomplete
                                    label="Search article.."
                                    slot="activator"
                                    append-icon=""
                                    prepend-icon="search"
                                    clearable
                                    search-input
                                    solo tags>
                                </v-select>
                            </v-card>

                            @foreach ($resources as $resource)
                            <v-card class="elevation-1 mb-3">
                                <v-card-media src="{{ $resource->feature }}" height="280px" width="100%">
                                    <div class="text-xs-right" style="width: 100%;">
                                        <v-avatar size="120px" style="position: absolute; bottom: 15px; left: 15px;">
                                            <img src="{{ $resource->user->avatar }}" alt="" style="border: 2px solid #fff;">
                                        </v-avatar>
                                    </div>
                                </v-card-media>
                                <v-card-text>
                                    <div class="title mb-2">{{ $resource->title }}</div>
                                    <div class="mb-4">
                                        <!-- <v-avatar size="30px" class="mr-2 ml-1"><img src="{{ $resource->user->avatar }}" alt=""></v-avatar> -->
                                        <span class="body-1">by {{ $resource->user->displayname }},
                                            <span class="grey--text">{{ $resource->created }}</span>
                                        </span>
                                    </div>
                                    <div class="subheading">{!! $resource->excerpt !!}</div>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn flat primary href="{{ route('stories.show', $resource->code) }}">{{ __('Read More') }}</v-btn>
                                    <v-spacer></v-spacer>
                                    <v-bottom-sheet v-model="sheet.share">
                                    <v-btn slot="activator" v-tooltip:left="{ 'html': 'Share' }" icon><v-icon>share</v-icon></v-btn>
                                    <v-list>
                                        <v-subheader>Share on</v-subheader>
                                        <v-list-tile
                                            ripple
                                            v-for="tile in tiles"
                                            :key="tile.title"
                                            @click="sheet.share = false"
                                            >
                                                <v-list-tile-avatar>
                                                    <v-avatar size="32px">
                                                        {{-- <img src="tile.icon" :alt="tile.title"> --}}
                                                        <v-icon v-bind:class="[tile.iconClass]">@{{ tile.icon }}</v-icon>
                                                    </v-avatar>
                                                </v-list-tile-avatar>
                                            <v-list-tile-title>@{{ tile.title }}</v-list-tile-title>
                                        </v-list-tile>
                                      </v-list>
                                    </v-bottom-sheet>
                                </v-card-actions>
                            </v-card>
                            @endforeach

                        </v-flex>
                        <v-flex md4 xs12>
                            <v-card class="elevation-1 mb-3 hidden-sm-and-down">
                                <v-select
                                    autocomplete
                                    label="Search article.."
                                    slot="activator"
                                    append-icon=""
                                    prepend-icon="search"
                                    clearable
                                    search-input
                                    solo tags
                                ></v-select>
                            </v-card>

                            @can('create-story')
                            <v-card class="elevation-1 mb-3">
                                <v-btn block large success class="elevation-0" href="{{ route('stories.create') }}"><v-icon left>add</v-icon>{{ __('Create a new story') }}</v-btn>
                            </v-card>
                            @endcan

                            <v-card class="elevation-1 mb-3">
                                <v-card class="elevation-0 mb-3 ">
                                    <v-card-text class="py-0">
                                        <v-subheader class="pl-0 grey--text text--darken-1">{{ __('ABOUT US') }}</v-subheader>
                                    </v-card-text>
                                    <v-card-text>
                                        <div class="mb-3 text-xs-center">
                                            <img src="{{ assets('frontier/images/public/exph_logo_o.png') }}" width="100%" style="max-width: 200px;">
                                        </div>
                                        <div class="subheading mb-2 text-xs-center grey--text">
                                            {!! $application->site->lead !!}
                                        </div>
                                        <div class="text-xs-center">
                                            <v-btn icon><v-icon>fa fa-facebook-official</v-icon></v-btn>
                                            <v-btn icon><v-icon>fa fa-instagram</v-icon></v-btn>
                                            <v-btn icon><v-icon>fa fa-twitter</v-icon></v-btn>
                                            <v-btn icon><v-icon>fa fa-pinterest</v-icon></v-btn>
                                        </div>
                                    </v-card-text>
                                </v-card>

                                <v-divider></v-divider>
                               <v-card class="elevation-0 my-3">
                                    <v-card-text class="py-0">
                                    <v-subheader class="pl-0 grey--text text--darken-1">{{ __('INSTAGRAM') }}</v-subheader>
                                    </v-card-text>
                                    <v-card-text>
                                        <v-layout row wrap>
                                            <v-flex xs4>
                                                <img src="{{ assets('frontier/images/placeholder/11.jpg') }}" alt="" width="100%">
                                            </v-flex>
                                            <v-flex xs4>
                                                <img src="{{ assets('frontier/images/placeholder/15.jpg') }}" alt="" width="100%">
                                            </v-flex>
                                            <v-flex xs4>
                                                <img src="{{ assets('frontier/images/placeholder/windmill.jpg') }}" alt="" width="100%">
                                            </v-flex>
                                        </v-layout>
                                        <v-layout row wrap>
                                            <v-flex xs4>
                                                <img src="{{ assets('frontier/images/placeholder/windmill.jpg') }}" alt="" width="100%">
                                            </v-flex>
                                            <v-flex xs4>
                                                <img src="{{ assets('frontier/images/placeholder/11.jpg') }}" alt="" width="100%">
                                            </v-flex>
                                            <v-flex xs4>
                                                <img src="{{ assets('frontier/images/placeholder/15.jpg') }}" alt="" width="100%">
                                            </v-flex>
                                        </v-layout>
                                        <v-btn block primary flat class="elevation-1">View on Instagram</v-btn>
                                    </v-card-text>
                                <v-divider></v-divider>
                                </v-card>


                                @if (isset($popular) && $popular)
                                    <v-card class="elevation-0 my-3">
                                        <v-card-text class="py-0">
                                            <v-subheader class="pl-0 grey--text text--darken-1">{{ __('POPULAR POSTS') }}</v-subheader>
                                        </v-card-text>
                                        <v-list two-line>
                                            <v-list-tile avatar @click="" ripple v-for="card in pop">
                                                <v-list-tile-avatar>
                                                    <img v-bind:src="card.src"/>
                                                </v-list-tile-avatar>
                                                <v-list-tile-content>
                                                    <v-list-tile-title>@{{ card.title }}</v-list-tile-title>
                                                    <v-list-tile-sub-title>@{{ card.date }}</v-list-tile-sub-title>
                                                </v-list-tile-content>
                                            </v-list-tile>
                                        </v-list>
                                    </v-card>
                                    <v-divider></v-divider>
                                @endif

                                @if (isset($categories) && $categories)
                                    <v-card class="elevation-0 my-3">
                                        <v-card-text class="py-0">
                                            <v-subheader class="pl-0 grey--text text--darken-1">{{ __('CATEGORIES') }}</v-subheader>
                                        </v-card-text>
                                        <v-list>
                                            <v-list-tile avatar @click="" ripple v-for="item in categories" v-bind:key="item.title">
                                                <v-list-tile-action>
                                                    <v-icon class="primary--text">label</v-icon>
                                                </v-list-tile-action>
                                                <v-list-tile-content>
                                                    <v-list-tile-title>@{{ item.title }}</v-list-tile-title>
                                                </v-list-tile-content>
                                                <v-list-tile-action>
                                                    <v-chip label small>24</v-chip>
                                                </v-list-tile-action>
                                            </v-list-tile>
                                        </v-list>
                                    </v-card>
                                @endif
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
    <style>
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
        .banner .parallax_content {
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

        @media (min-width: 60em) {
            .sidebar {
                position: sticky;
                top: 85px;
                float: right;
                width: 30%;
            }
            .content {
                margin-right: 30px;
            }
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
                    sheet: {
                        share: false,
                    },
                    tiles: [
                        { icon: 'fa fa-facebook-official', title: 'Facebook', iconClass: 'blue--text text--darken-3' },
                        { icon: 'fa fa-google-plus', title: 'Google+', iconClass: 'red--text text--darken-1' },
                        { icon: 'fa fa-twitter', title: 'Twitter', iconClass: 'light-blue--text' },
                        { icon: 'fa fa-pinterest', title: 'Pinterest', iconClass: 'red--text'},
                    ],
                    e1: 'recent',
                    from: null,
                    to: null,
                    menu: false,
                    categories: [
                        {
                            title: 'Article'
                        },
                        {
                            title: 'Canon Photo Adventure'
                        },
                        {
                            title: 'Experience Philippines'
                        },
                        {
                            title: 'Inspiration'
                        }
                    ],
                    stories: [
                        {
                            src: '{{ assets('frontier/images/placeholder/gradient.png') }}',
                            avatar: '{{ assets('frontier/images/public/s4.jpg') }}',
                            title: 'Road Tripper Monday: Janrey Ligutan',
                            user: 'Jane Appleseed',
                            date: 'November 21, 2017',
                            overview: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, aliquam! Est eveniet explicabo maiores ea beatae aperiam aliquid quia, dignissimos necessitatibus labore, assumenda consequatur commodi dolore, mollitia provident ad. Ut.'
                        },
                        {
                            src: '{{ assets('frontier/images/placeholder/8.jpg') }}',
                            avatar: '{{ assets('frontier/images/public/s5.jpg') }}',
                            title: 'Road Tripper Monday: Nikki Escanillas',
                            user: 'Jane Appleseed',
                            date: 'November 11, 2017',
                            overview: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, aliquam! Est eveniet explicabo maiores ea beatae aperiam aliquid quia, dignissimos necessitatibus labore, assumenda consequatur commodi dolore, mollitia provident ad. Ut.'
                        },
                        {
                            src: '{{ assets('frontier/images/placeholder/city.jpg') }}',
                            avatar: '{{ assets('frontier/images/public/s3.jpg') }}',
                            title: 'Road Tripper Monday: Nikki Escanillas',
                            user: 'Jane Appleseed',
                            date: 'November 11, 2017',
                            overview: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, aliquam! Est eveniet explicabo maiores ea beatae aperiam aliquid quia, dignissimos necessitatibus labore, assumenda consequatur commodi dolore, mollitia provident ad. Ut.'
                        },
                    ],
                    pop: [
                        {
                            src: '{{ assets('frontier/images/public/s2.jpg') }}',
                            title: "10 Reasons Why I'd Love To Visit Isabela Province Again",
                            date: 'November 22, 2017'
                        },
                        {
                            src: '{{ assets('frontier/images/public/s1.jpg') }}',
                            title: "Road Tripper Monday: Ginie Gonnacao",
                            date: 'November 18, 2017'
                        },
                        {
                            src: '{{ assets('frontier/images/public/s3.jpg') }}',
                            title: 'Road Tripper Monday: Jen Medrano',
                            date: 'November 15, 2017'
                        },
                        {
                            src: '{{ assets('frontier/images/public/s4.jpg') }}',
                            title: 'Road Tripper Monday: Nikki Escanillas',
                            date: 'November 12, 2017'
                        },
                    ],
                }
            },
        });
    </script>
@endpush
