@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1 hidden-sm-and-down">
        <v-card-media src="{{ assets('frontier/images/public/car.jpg') }}" height="450px">
            <v-toolbar dark class="elevation-0 transparent">
                <v-btn flat href="\budgets"><v-icon>keyboard_backspace</v-icon> Back</v-btn>
            </v-toolbar>
        </v-card-media>
    </v-card>
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex md3 xs12 class="hidden-sm-and-down">
                <div class="stickybar">
                    <v-card class="elevation-1 mb-3">
                        <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-title>Travel Manager</v-toolbar-title>
                        </v-toolbar>
                        <v-divider></v-divider>
                        <v-card-text class="text-xs-center">
                            <div class="mb-2">
                                <v-avatar size="200px">
                                    <img src="{{ assets('frontier/images/placeholder/man.jpg') }}" alt="">
                                </v-avatar>
                            </div>
                            <span class="body-2 block pb-2">Cole Sprouse</span>
                            <div>
                                The Travel Manager is the guy who will make sure your road trip will be full of adventures, excitement, tales to tell your grandchildren, epic memories and unforgettable experiences.
                            </div>
                        </v-card-text>
                    </v-card>

                    <v-card class="elevation-1 mb-3">
                        <v-list subheader class="py-3">
                            <v-list-tile avatar>
                                <v-list-tile-avatar tile>
                                    <img src="{{ assets('frontier/images/public/cancel.png') }}"/>
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Cancellation Policy</v-list-tile-title>
                                    <v-list-tile-sub-title>Cancel before the trip</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                        <v-divider></v-divider>
                        <v-list two-line subheader>
                            <v-list-tile avatar>
                                <v-list-tile-action>
                                    <v-icon warning>warning</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title class="fw-500">Full Refund</v-list-tile-title>
                                    <v-list-tile-sub-title>Before 2 weeks</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile avatar>
                                <v-list-tile-action>
                                    <v-icon warning>warning</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title class="fw-500">Half Refund</v-list-tile-title>
                                    <v-list-tile-sub-title>5 to 10 business days</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile avatar>
                                <v-list-tile-action>
                                    <v-icon warning>warning</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title class="fw-500">No Refund</v-list-tile-title>
                                    <v-list-tile-sub-title>Within or less than 5 days</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </div>
            </v-flex>

            <v-flex md6 xs12>
                <v-card class="elevation-1 mb-3">
                    <div class="hidden-md-and-up">
                        <v-card-media class="elevation-1" src="{{ assets('frontier/images/public/car.jpg') }}" height="200px">
                        </v-card-media>
                    </div>
                    <v-toolbar dark class="elevation-1 blue">
                        <v-toolbar-title>Multi-Traveler - Road Trip: 3-Day Getaway</v-toolbar-title>
                    </v-toolbar>
                    <div class="hidden-md-and-up">
                        <v-card-text>
                            <v-toolbar class="elevation-0 transparent">
                                <v-toolbar-title>Travel Manager</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text class="grey--text text--darken-2 subheading">
                                <p>A Few Details You Might Want To Know</p>
                                <p>
                                    <v-avatar size="100px">
                                        <img src="{{ assets('frontier/images/placeholder/man.jpg') }}" alt="">
                                    </v-avatar>
                                </p>
                                <p><strong>Cole Sprouse</strong></p>
                                <p>The Travel Manager is the guy who will make sure your road trip will be full of adventures, excitement, tales to tell your grandchildren, epic memories and unforgettable experiences.</p>
                            </v-card-text>
                        </v-card-text>
                    </div>
                    <v-divider></v-divider>

                    <v-card-text>
                        <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-title>Have your own car? Hit the road!</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p>Have a car? We'll provide:</p>
                            <ul>
                                <li>Directions to your destination</li>
                                <li>Accommodation reservation</li>
                                <li>Recommendations for roadside attractions along the way</li>
                                <li>Curated map of recommendations for your destination.</li>
                            </ul>
                        </v-card-text>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p><strong>You MUST provide your own car for this travel option.</strong></p>
                            <p>Your destination will be within ~3-4 hours of your departure location.</p>
                            <p>Budget selection is per person.</p>
                            <p>If you have more than 4 travelers, please contact giancarlo@experience.ph to coordinate traveler details.</p>
                        </v-card-text>
                    </v-card-text>

                    <v-divider class="hidden-md-and-up"></v-divider>
                    <v-list subheader class="py-0 hidden-md-and-up">
                        <v-subheader>Frequently Asked Questions</v-subheader>
                        <v-list-tile avatar ripple href="\faq">
                            <v-list-tile-avatar tile>
                                <img src="{{ assets('frontier/images/public/question.png') }}"/>
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>Experience Philippines</v-list-tile-title>
                                <v-list-tile-sub-title>Help Center</v-list-tile-sub-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-card>
                @include("Public::parts.review-exp")
            </v-flex>

            <v-flex md3 xs12 class="hidden-sm-and-down">
                <div class="stickybar">
                    <v-card class="elevation-1 mb-3">
                        <v-card-media src="{{ assets('frontier/images/placeholder/red2.jpg') }}">
                            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                            <v-card-text class="text-xs-center">
                                <v-card dark class="elevation-0 transparent pt-4">
                                    <div class="title pb-3 white--text"><strong>Multi-Traveler - Road Trip: <br> 3-Day Getaway</strong></div>
                                    <div class="headline pb-2 white--text">from ₱<span class="fw-500"> 600</span></div>

                                    <div>
                                        <v-icon  n class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star_half</v-icon>
                                        <span class="caption">4.6</span>
                                    </div>

                                    <v-layout row wrap justify-center align-center>
                                        <v-flex xs12>
                                            <div class="py-4">
                                                <v-select
                                                    class="mb-3"
                                                    label="Select budget"
                                                    slot="activator"
                                                    append-icon="keyboard_arrow_down"
                                                    v-bind:items="items"
                                                    v-model="e1"
                                                    single-line
                                                    clearable
                                                    solo>
                                                </v-select>
                                                <v-select
                                                    autocomplete
                                                    class="mb-3"
                                                    label="Number of Travelers"
                                                    append-icon=""
                                                    clearable
                                                    search-input
                                                    solo tags>
                                                </v-select>
                                                <div class="text-xs-center">
                                                    <v-dialog v-model="dialog.budget" fullscreen transition="dialog-bottom-transition" :overlay=false>
                                                        <v-btn primary block large round class="elevation-1 px-5" slot="activator">Get Going</v-btn>
                                                        @include("Budget::widgets.form")
                                                    </v-dialog>
                                                </div>
                                            </div>
                                        </v-flex>
                                    </v-layout>
                                </v-card>
                            </v-card-text>
                        </v-card-media>
                    </v-card>

                    <v-card class="elevation-1 mb-3">
                        <v-list subheader class="py-0">
                            <v-subheader>Frequently Asked Questions</v-subheader>
                            <v-list-tile avatar ripple href="\faq">
                                <v-list-tile-avatar tile>
                                    <img src="{{ assets('frontier/images/public/question.png') }}"/>
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>Experience Philippines</v-list-tile-title>
                                    <v-list-tile-sub-title>Help Center</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </div>
            </v-flex>
        </v-layout>

        <v-layout row wrap align-center justify-center>
            <v-flex lg10 sm12 xs12>
                @include("Public::parts.similar-listing")
            </v-flex>
        </v-layout>
    </v-container>

    {{-- mobile viewport --}}
    <v-card class="elevation-1 fixed-nav hidden-md-and-up" style="z-index: 3;">
        <v-divider></v-divider>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card-actions>
                    <v-card-text class="px-0 py-2">
                        <div class="subheading pl-4"><strong>₱ 6,000</strong> <span class="body-1">per person</span></div>
                        <v-dialog class="hidden-md-and-up" v-model="dialog.book" fullscreen transition="dialog-bottom-transition" :overlay=false>
                            <v-btn flat small class="body-2 primary--text details-btn" slot="activator">See details</v-btn>
                            <v-card>
                                <v-toolbar light class="white elevation-0">
                                    <v-spacer></v-spacer>
                                    <v-btn icon @click.native="dialog.book = false">
                                        <v-icon>close</v-icon>
                                    </v-btn>
                                </v-toolbar>
                                <v-card-media src="{{ assets('frontier/images/placeholder/red2.jpg') }}">
                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                    <v-card-text class="text-xs-center">
                                        <v-card dark class="elevation-0 transparent pt-4">
                                            <div class="title pb-3 white--text"><strong>Multi-Traveler - Road Trip: <br> 3-Day Getaway</strong></div>
                                            <div class="headline pb-2 white--text">from ₱<span class="fw-500"> 600</span></div>

                                            <div>
                                                <v-icon  n class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star_half</v-icon>
                                                <span class="caption">4.6</span>
                                            </div>

                                            <v-layout row wrap justify-center align-center>
                                                <v-flex xs12>
                                                    <div class="py-4">
                                                        <v-select
                                                            class="mb-3"
                                                            label="Select budget"
                                                            slot="activator"
                                                            append-icon="keyboard_arrow_down"
                                                            v-bind:items="items"
                                                            v-model="e1"
                                                            single-line
                                                            clearable
                                                            solo>
                                                        </v-select>
                                                        <v-select
                                                            autocomplete
                                                            class="mb-3"
                                                            label="Number of Travelers"
                                                            append-icon=""
                                                            clearable
                                                            search-input
                                                            solo tags>
                                                        </v-select>
                                                        <div class="text-xs-center">
                                                            <v-dialog v-model="dialog.budget" fullscreen transition="dialog-bottom-transition" :overlay=false>
                                                                <v-btn primary block large round class="elevation-1 px-5" slot="activator">Get Going</v-btn>
                                                                @include("Budget::widgets.form")
                                                            </v-dialog>
                                                        </div>
                                                    </div>
                                                </v-flex>
                                            </v-layout>
                                        </v-card>
                                    </v-card-text>
                                </v-card-media>

                                <v-divider></v-divider>
                                <v-list subheader class="py-3">
                                    <v-list-tile avatar>
                                        <v-list-tile-avatar tile>
                                            <img src="{{ assets('frontier/images/public/cancel.png') }}"/>
                                        </v-list-tile-avatar>
                                        <v-list-tile-content>
                                            <v-list-tile-title>Cancellation Policy</v-list-tile-title>
                                            <v-list-tile-sub-title>Cancel before the trip</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                                <v-divider></v-divider>
                                <v-list two-line subheader>
                                    <v-list-tile avatar>
                                        <v-list-tile-action>
                                            <v-icon warning>warning</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="fw-500">Full Refund</v-list-tile-title>
                                            <v-list-tile-sub-title>Before 2 weeks</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile avatar>
                                        <v-list-tile-action>
                                            <v-icon warning>warning</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="fw-500">Half Refund</v-list-tile-title>
                                            <v-list-tile-sub-title>5 to 10 business days</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile avatar>
                                        <v-list-tile-action>
                                            <v-icon warning>warning</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="fw-500">No Refund</v-list-tile-title>
                                            <v-list-tile-sub-title>Within or less than 5 days</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                            </v-card>
                        </v-dialog>
                    </v-card-text>
                    <v-spacer></v-spacer>
                    <v-card-text class="px-0 py-2 text-xs-right">
                        <v-dialog v-model="dialog.budget" fullscreen transition="dialog-bottom-transition" :overlay=false>
                            <v-btn large primary round class="elevation-1 px-5" slot="activator">Get Going</v-btn>
                            @include("Budget::widgets.form")
                        </v-dialog>
                    </v-card-text>
                </v-card-actions>
            </v-flex>
        </v-layout>
    </v-card>
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

        @media (min-width: 60em) {
            .stickybar {
                position: sticky;
                top: 80px;
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
                    e1: 'recent',
                    from: null,
                    to: null,
                    menu: false,
                    dialog: {
                        book: false
                    },
                    dialog: {
                        budget: false
                    },
                    dates: [
                        { title: 'Click Me' },
                        { title: 'Click Me' },
                        { title: 'Click Me' },
                        { title: 'Click Me 2' }
                    ],
                    exp: [
                        {
                            title: 'FULL MOON PARTY Luna Sea: A Random Full Moon Party #4',
                            price: '₱ 6,000',
                            category: 'Retro Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/public/alabama.jpg') }}'
                        },
                        {
                            title: 'Retro Road Trip #2',
                            price: '₱ 10,000',
                            category: 'Singles Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/public/el_capitan.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 13,000',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/placeholder/yosemite.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 4,000',
                            category: 'Special Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/public/h3.jpg') }}'
                        }
                    ],
                    reco: [
                        {
                            title: 'FULL MOON PARTY Luna Sea: A Random Full Moon Party #4',
                            price: '₱ 6,000',
                            category: 'Retro Road Trip',
                            date: 'Oct 21-22',
                            src: '{{ assets('frontier/images/public/r1.jpg') }}'
                        },
                        {
                            title: 'Retro Road Trip #2',
                            price: '₱ 10,000',
                            category: 'Singles Road Trip',
                            date: 'Sep 11-13',
                            src: '{{ assets('frontier/images/public/r3.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 13,000',
                            category: 'Random Road Trip',
                            date: 'Aug 21-22',
                            src: '{{ assets('frontier/images/public/r2.jpg') }}'
                        },
                        {
                            title: 'Super Mega Awesome Random Road Trip #3',
                            price: '₱ 4,000',
                            category: 'Special Road Trip',
                            date: 'July 11-13',
                            src: '{{ assets('frontier/images/public/r4.jpg') }}'
                        }
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
                    ],
                    e1: null,
                    items: [
                        { text: '₱ 600' },
                        { text: '₱ 800' },
                        { text: '₱ 1, 000' },
                        { text: '₱ 1, 200' },
                        { text: '₱ 1, 500' },
                        { text: '₱ 2, 000' },
                        { text: '₱ 2, 500' }
                    ],
                    a1: null,
                    a2: null,
                    b1: null,
                    b2: null,
                    b3: null,
                    b4: null,
                    b5: null,
                    text: 'center',
                    schedule: null,
                    insurance: 'radio-1',
                }
            },
        });
    </script>
@endpush
