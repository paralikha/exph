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
                <v-btn flat href="\roadtrips"><v-icon>keyboard_backspace</v-icon> Back</v-btn>
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
                                <v-avatar size="100px">
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
                        <v-toolbar-title>Random Road Trip #1</v-toolbar-title>
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
                            <v-toolbar-title>What is going to happen?</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p>A Few Details You Might Want To Know</p>
                            <ul>
                                <li>Discover a culture green from Manila</li>
                                <li>Discover a less touristy place</li>
                            </ul>
                        </v-card-text>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p>Package Includes</p>
                            <v-layout row wrap justify-space-between>
                                <v-flex sm4 xs12 class="py-0">
                                    <v-card-actions class="pa-0 pb-1">
                                        <v-avatar size="40px">
                                            <v-icon class="title mr-2">directions_car</v-icon>
                                        </v-avatar>
                                        <div> Transport</div>
                                    </v-card-actions>
                                </v-flex>
                                <v-flex sm4 xs12 class="py-0">
                                    <v-card-actions class="pa-0 pb-1">
                                        <v-avatar size="40px">
                                            <v-icon class="title mr-2">local_hotel</v-icon>
                                        </v-avatar>
                                        <div> Accomodation</div>
                                    </v-card-actions>
                                </v-flex>
                                <v-flex sm4 xs12 class="py-0">
                                    <v-card-actions class="pa-0 pb-1">
                                        <v-avatar size="40px">
                                            <v-icon class="title mr-2">restaurant</v-icon>
                                        </v-avatar>
                                        <div> Major Meals</div>
                                    </v-card-actions>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p class="mb-0">Deadline of Payment is November 15, 2017</p>
                        </v-card-text>
                    </v-card-text>
                    <v-divider></v-divider>

                    <v-card-text>
                        <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-title>What to expect?</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p>A Little Something About This Trip</p>
                            <ul>
                                <li>We are going to travel with people we do not know</li>
                                <li>It will be about memorable moments, big laughs, and team work</li>
                                <li>Kindly bring some extra cash for food, drinks or some snacks</li>
                            </ul>
                        </v-card-text>
                    </v-card-text>
                    <v-divider></v-divider>

                    <v-card-text>
                        <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-title>How to make a reservation?</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p>BPI Account Number</p>
                                <v-list two-line subheader>
                                    <v-list-tile avatar>
                                        <v-list-tile-avatar>
                                            <v-icon>credit_card</v-icon>
                                        </v-list-tile-avatar>
                                        <v-list-tile-content>
                                            <v-list-tile-title>9641-0003-69</v-list-tile-title>
                                            <v-list-tile-sub-title>EXPH Travel Differently Inc.</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                                <p>For proof of payment</p>
                                <v-list two-line subheader>
                                    <v-list-tile avatar>
                                        <v-list-tile-avatar>
                                            <v-icon>contact_phone</v-icon>
                                        </v-list-tile-avatar>
                                        <v-list-tile-content>
                                            <v-list-tile-title>0917-563-9692</v-list-tile-title>
                                            <v-list-tile-sub-title>Send a text message of your deposit</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile avatar>
                                        <v-list-tile-avatar>
                                            <v-icon>email</v-icon>
                                        </v-list-tile-avatar>
                                        <v-list-tile-content>
                                            <v-list-tile-title>adventures@experience.ph</v-list-tile-title>
                                            <v-list-tile-sub-title>Send the scanned deposit slip</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                                <p>You can pay us through credit card via  Paypal's secured payment website</p>
                        </v-card-text>
                    </v-card-text>
                    <v-divider></v-divider>

                    <v-card-text>
                        <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-title>What to bring?</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p>Your Roadtrip Essentials</p>

                            <ul>
                                <li>Comfy and reliable shoes for wet, dry, and rocky surfaces</li>
                                <li>Swim wear</li>
                                <li>Mosquito Repellent</li>
                                <li>Lots of sunblock</li>
                            </ul>
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
                                <v-card dark class="elevation-0 transparent py-5">
                                    <div class="title pb-3 white--text"><strong>Random Road Trip #1</strong></div>
                                    <div class="display-2 white--text">₱<span class="fw-500"> 6,000</span></div>
                                    <div class="body-2 white--text mb-2">per person</span></div>

                                    <div>
                                        <v-icon  n class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                        <v-icon class="subheading orange--text text--darken-1 pb-1">star_half</v-icon>
                                        <span class="caption">4.6</span>
                                    </div>
                                </v-card>
                                    <div class="text-xs-center">
                                        <v-btn primary large round class="elevation-1 px-4" href="{{ route('billings.index') }}">Experience Now</v-btn>
                                    </div>
                            </v-card-text>
                        </v-card-media>
                        <v-list two-line>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon color="indigo">date_range</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>November 24 to 26</v-list-tile-title>
                                    <v-list-tile-sub-title>2017</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon color="indigo">schedule</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>8pm, Friday</v-list-tile-title>
                                    <v-list-tile-sub-title>3 days</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-divider></v-divider>
                            <v-card-text class="text-xs-center pa-1">
                                <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                                <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                                <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-google</v-icon></v-btn>
                            </v-card-text>
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
                                        <v-card dark class="elevation-0 transparent py-5">
                                            <div class="title pb-3 white--text"><strong>Random Road Trip #1</strong></div>
                                            <div class="display-2 white--text">₱<span class="fw-500"> 6,000</span></div>
                                            <div class="body-2 white--text mb-2">per person</span></div>

                                            <div>
                                                <v-icon  n class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="subheading orange--text text--darken-1 pb-1">star_half</v-icon>
                                                <span class="caption">4.6</span>
                                            </div>
                                        </v-card>
                                            <div class="text-xs-center">
                                                <v-btn primary large round class="elevation-1 px-4" href="..\billings">Experience Now</v-btn>
                                            </div>
                                    </v-card-text>
                                </v-card-media>
                                <v-list two-line>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon color="indigo">date_range</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>November 24 to 26</v-list-tile-title>
                                            <v-list-tile-sub-title>2017</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon color="indigo">schedule</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>8pm, Friday</v-list-tile-title>
                                            <v-list-tile-sub-title>3 days</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-divider></v-divider>
                                    <v-card-text class="text-xs-center pa-1">
                                        <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                                        <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                                        <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-google</v-icon></v-btn>
                                    </v-card-text>
                                </v-list>
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
                                <v-divider></v-divider>
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
                        </v-dialog>
                    </v-card-text>
                    <v-spacer></v-spacer>
                    <v-card-text class="px-0 py-2 text-xs-right">
                        <v-btn large primary round class="elevation-1 px-2" href="..\billings">Experience Now</v-btn>
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
                }
            },
        });
    </script>
@endpush
