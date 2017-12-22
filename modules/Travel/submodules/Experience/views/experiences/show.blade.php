@extends("Theme::layouts.public")
@section("head-title", $resource->name)
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Theme::partials.navigation")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1 hidden-sm-and-down">
        <v-card-media src="{{ @$resource->feature }}" height="450px">
            <v-toolbar dark class="elevation-0 transparent">
                <v-btn flat href="\experiences"><v-icon left>keyboard_backspace</v-icon>{{ __('Back') }}</v-btn>
            </v-toolbar>
        </v-card-media>
    </v-card>
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex md3 xs12 class="hidden-sm-and-down">
                <div class="stickybar">
                    {{-- TRAVEL MANAGER CARD --}}
                    <v-card class="elevation-1 mb-3">
                        <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-title>{{ __('Travel Manager') }}</v-toolbar-title>
                        </v-toolbar>
                        <v-divider></v-divider>
                        <v-card-text class="text-xs-center">
                            <div class="mb-2">
                                <v-avatar size="200px">
                                    <img src="{{ $resource->user->avatar }}" alt="">
                                </v-avatar>
                            </div>
                            <span class="body-2 block pb-2">{{ $resource->user->fullname }}</span>
                            <div class="grey--text">
                                {{ __("The Travel Manager is the one who will make sure your road trip will be full of adventures, excitement, tales to tell your grandchildren, epic memories and unforgettable experiences.") }}
                            </div>
                        </v-card-text>
                    </v-card>
                    {{-- TRAVEL MANAGER CARD --}}

                    {{-- CANCEL CARD --}}
                    <v-card class="elevation-1 mb-3">
                        <v-list subheader class="py-3">
                            <v-list-tile avatar>
                                <v-list-tile-avatar tile>
                                    <img src="{{ assets('frontier/images/public/cancel.png') }}"/>
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>{{ __('Cancellation Policy') }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ __("You may cancel before the trip") }}</v-list-tile-sub-title>
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
                                    <v-list-tile-title class="fw-500">{{ __('Full Refund') }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ __('Before 2 weeks') }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile avatar>
                                <v-list-tile-action>
                                    <v-icon warning>warning</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title class="fw-500">{{ __('Half Refund') }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ __('5 to 10 business days') }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile avatar>
                                <v-list-tile-action>
                                    <v-icon warning>warning</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title class="fw-500">{{ __('No Refund') }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ __('Within or less than 5 days') }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                    {{-- CANCEL CARD --}}

                </div>
            </v-flex>

            <v-flex md6 xs12>
                <v-card class="elevation-1 mb-3">
                    <div class="hidden-md-and-up">
                        <v-card-media class="elevation-1" src="{{ $resource->feature }}" height="200px">
                            <v-toolbar dark class="elevation-0 transparent">
                                <v-btn flat href="\experiences"><v-icon left>keyboard_backspace</v-icon>{{ __('Back') }}</v-btn>
                            </v-toolbar>
                        </v-card-media>
                    </div>
                    <v-toolbar dark flat class="blue">
                        <v-toolbar-title>{{ $resource->name }}</v-toolbar-title>
                    </v-toolbar>
                    <div class="hidden-md-and-up">
                        <v-card-text>
                            <v-toolbar class="elevation-0 transparent">
                                <v-toolbar-title>{{ __('Travel Manager') }}</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text class="grey--text text--darken-2 subheading">
                                <p class="text-xs-center">
                                    <v-avatar size="100px">
                                        <img src="{{ $resource->user->avatar }}" alt="">
                                    </v-avatar>
                                </p>
                                <p class="text-xs-center"><strong>{{ $resource->user->displayname }}</strong></p>
                                <p class="text-xs-center">{{ __('The Travel Manager is the guy who will make sure your road trip will be full of adventures, excitement, tales to tell your grandchildren, epic memories and unforgettable experiences.') }}</p>
                            </v-card-text>
                        </v-card-text>
                    </div>
                    <v-divider></v-divider>

                    <v-card flat class="pa-3">

                        {{-- BODY --}}
                        <v-card-text class="grey--text text--darken-2 subheading page-text">
                            {!! $resource->body !!}
                        </v-card-text>
                        {{-- BODY --}}

                        {{-- PACKAGE INCLUSIONS --}}
                        <v-card-text class="grey--text text--darken-2 subheading">
                            <p><strong>{{ __('Package Inclusions') }}</strong></p>
                            <v-layout row wrap justify-space-between>
                                @foreach ($resource->amenities as $amenity)
                                    <v-flex sm4 xs12 class="py-0">
                                        <v-card-actions class="pa-0 pb-1">
                                            <v-avatar size="40px">
                                                <v-icon class="title mr-2">{{ $amenity->icon }}</v-icon>
                                            </v-avatar>
                                            <div>{{ __($amenity->name) }}</div>
                                        </v-card-actions>
                                    </v-flex>
                                @endforeach
                            </v-layout>
                        </v-card-text>
                        {{-- PACKAGE INCLUSIONS --}}

                    </v-card>

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
                                        <v-list-tile-title>{{ settings('ad', '9641-0003-69') }}</v-list-tile-title>
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

                    {{-- MAP --}}
                    <v-divider></v-divider>
                    <v-card-text>
                        <p><strong>{{ __('Meetup Place') }}</strong></p>
                        <div class="pb-4">{!! nl2br($resource->map_instructions) !!}</div>
                        {!! $resource->map !!}
                    </v-card-text>
                    <v-divider></v-divider>
                    {{-- MAP --}}


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
                        @can('edit-experience')
                        <v-card-actions>
                            <span class="grey--text caption">{{ __("Logged in as:") }} <em>{{ user()->displayrole }}</em></span>
                            <v-spacer></v-spacer>
                            <v-btn icon v-tooltip:left="{ 'html': 'Edit Experience' }" href="{{ route('experiences.edit', $resource->id) }}">
                                <v-icon>edit</v-icon>
                            </v-btn>
                        </v-card-actions>
                        @endcan

                        <v-card-media src="{{ assets('frontier/images/placeholder/red2.jpg') }}">
                            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>

                            <v-card-text class="text-xs-center">
                                <v-card dark class="elevation-0 transparent py-5">
                                    <div class="title pb-3 white--text"><strong>{{ $resource->name }}</strong></div>
                                    <div class="display-2 white--text"><span class="fw-500">{{ $resource->amount }}</span></div>
                                    <div class="body-2 white--text mb-2">{{ __('per person') }}</span></div>
                                    <div>
                                        @if (user())
                                            <span class="star-rating-system" data-rating="{{ $resource->rating }}"></span>
                                        @else
                                            <span class="star-rating-system--readonly" data-rating="{{ $resource->rating }}"></span>
                                        @endif
                                        <span class="caption">{{ $resource->rating }}</span>
                                    </div>
                                </v-card>
                                    <div class="text-xs-center">
                                        <v-btn primary large round class="elevation-1 px-4" href="{{ route('experiences.details', $resource->code) }}">{{ __('Experience Now') }}</v-btn>
                                    </div>
                            </v-card-text>
                        </v-card-media>
                        <v-list two-line>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon color="indigo">date_range</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>{{ $resource->date }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ $resource->days }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-action>
                                    <v-icon color="indigo">schedule</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>{{ "$resource->time" }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ __($resource->day) }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-divider></v-divider>
                            <v-card-text class="text-xs-center pa-1">
                                <!-- @include("Theme::recursives.main-menu", ['items' => get_navmenus('social-menu')]) -->
                                <v-card-text class="text-xs-center pa-1">
                                        <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                                        <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                                        <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-google</v-icon></v-btn>
                                    </v-card-text>
                            </v-card-text>
                        </v-list>
                    </v-card>

                    <v-card class="elevation-1 mb-3">
                        <v-list subheader class="py-0">
                            <v-subheader>Frequently Asked Questions</v-subheader>
                            <v-list-tile avatar ripple href="{{ route('public.show', 'faq') }}">
                                <v-list-tile-avatar tile>
                                    <img src="{{ assets('frontier/images/public/question.png') }}"/>
                                </v-list-tile-avatar>
                                <v-list-tile-content>
                                    <v-list-tile-title>{{ __('Experience Philippines') }}</v-list-tile-title>
                                    <v-list-tile-sub-title>{{ __('Help Center') }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </div>
            </v-flex>
        </v-layout>

        <v-layout row wrap align-center justify-center>
            <v-flex lg10 sm12 xs12>
                 <!-- @include("Public::parts.similar-listing") -->
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
                        <div class="subheading pl-4"><strong>{{ $resource->amount }}</strong> <span class="body-1">per person</span></div>
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
                                            <div class="title pb-3 white--text"><strong>{{ $resource->name }}</strong></div>
                                            <div class="display-2 white--text">{{ $resource->amount }}</span></div>
                                            <div class="body-2 white--text mb-2">per person</span></div>

                                            <div>
                                                <span class="star-rating-system" data-rating="{{ $resource->rating }}"></span>
                                                <span class="caption">{{ $resource->rating }}</span>
                                            </div>
                                        </v-card>
                                            <div class="text-xs-center">
                                                <v-btn primary large round class="elevation-1 px-4" href="{{ route('experiences.details', $resource->code) }}">Experience Now</v-btn>
                                            </div>
                                    </v-card-text>
                                </v-card-media>
                                <v-list two-line>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon color="indigo">date_range</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>{{ $resource->date }}</v-list-tile-title>
                                            <v-list-tile-sub-title>{{ $resource->days }}</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon color="indigo">schedule</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>{{ "$resource->time" }}</v-list-tile-title>
                                            <v-list-tile-sub-title>3{{ __($resource->day) }}</v-list-tile-sub-title>
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
                            </v-card>
                        </v-dialog>
                    </v-card-text>
                    <v-spacer></v-spacer>
                    <v-card-text class="px-0 py-2 text-xs-right">
                        <v-btn large primary round class="elevation-1 px-2" href="{{ route('experiences.details', $resource->code) }}">Experience Now</v-btn>
                    </v-card-text>
                </v-card-actions>
            </v-flex>
        </v-layout>
    </v-card>

    @include("Theme::partials.footer")
@endsection

@push('css')
    <link rel="stylesheet" href="{{ assets('experience/js/jquery.star-rating-svg.min.css') }}">
    <style>
        .page-text h3 {
            font-size: 20px;
            font-weight: 500;
            line-height: 1;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
        }
        .page-text hr {
            display: block;
            width: 100%;
            height: 1px;
            border: none;
            background-color: rgba(0,0,0,0.09);
            margin: 3rem 0;
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
        iframe {
            width: 100%;
        }
    </style>
@endpush

@push('pre-scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="{{ assets('experience/js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment.min.js"></script>
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
                }
            },
            mounted () {
                let self = this;
                $('.star-rating-system--readonly').each(function (e) {
                    let rating = $(this).data('rating');
                    $(this).starRating({
                        starSize: 16,
                        totalStars: 5,
                        initialRating: rating,
                        readOnly: true,
                        emptyColor: 'lightgray',
                        activeColor: 'orange',
                        useGradient: false,
                        disableAfterRate: true,
                    });
                });
                $('.star-rating-system').each(function (e) {
                    let rating = $(this).data('rating');
                    $(this).starRating({
                        starSize: 16,
                        totalStars: 5,
                        initialRating: rating,
                        readOnly: false,
                        emptyColor: 'lightgray',
                        activeColor: 'orange',
                        useGradient: false,
                        disableAfterRate: true,
                        callback: function(currentRating, $el){
                            console.log(currentRating);
                            self.$http.post('{{ route('experiences.rate', $resource->id) }}', {'user_id': '{{ @user()->id }}', _token: '{{csrf_token()}}','rate':currentRating}).then(data => {
                                console.log(data);
                            })
                        }
                    });
                })
            }
        });
    </script>
@endpush
