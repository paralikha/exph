@extends("Theme::layouts.public")

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Theme::partials.navigation")
        </v-toolbar>
    </v-card>

    <v-card class="banner elevation-1">
        <v-parallax class="elevation-0" height="450" src="{{ assets('frontier/images/public/car.jpg') }}">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("BOOK A SURPRISE") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{__("A Road Trip For The Adventure Seekers")}}</h5>
            </v-layout>
        </v-parallax>
    </v-card>

    <section id="bookings" class="py-5">
        <v-container fluid grid-list-lg>
            @if (! $resources->count())
                <v-layout row wrap>
                    <v-flex xs12 sm6 offset-sm3>
                        <v-card class="elevation-0 transparent" height="400px">
                            <v-card-text class="text-xs-center my-3">
                                <img src="{{ assets('frontier/images/public/sad.png') }}" alt="" height="80" class="mb-3">
                                <h2 class="subheading grey--text">
                                    {{ __("No Bookings found with those parameters.") }}
                                </h2>
                                <v-btn large href="{{ route('bookings.create') }}" class="primary subheading">{{ __('Create New Booking') }}</v-btn>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
            @else
                <v-layout row wrap align-center justify-center>
                    <v-flex lg10 xs12>
                        <v-card-text class="text-xs-center my-3">
                            <h2 class="display-1">{{ __("CHOOSE A SURPRISE TRIP") }}</h2>
                            <h2 class="subheading grey--text text--darken-1">
                                {{ __("Select your mode of transportation + budget. Complete the survey. Go somewhere.") }}
                            </h2>
                        </v-card-text>
                        <v-layout row wrap align-center>
                            <v-flex xs12 sm4 md3 v-for="(card, key) in bookings.data" :key="key">
                                <a :href="card.url" ripple class="td-n">
                                    <v-card class="elevation-1 c-lift">
                                        <v-card-media
                                            height="180px"
                                            :src="card.feature"
                                            class="grey lighten-4">
                                            <div class="text-xs-right" style="width: 100%;">
                                                <v-btn large v-tooltip:left="{ html: '{{ __('Add to wishlist') }}' }" icon class="mr-3">
                                                    @include("Booking::components.wishlist")
                                                </v-btn>
                                                <v-chip label class="ma-0 white--text green lighten-1" style="position: absolute; bottom: 15px; right: 0;">
                                                    from @{{ card.amount }}</v-chip>
                                            </div>
                                        </v-card-media>
                                        <v-divider class="grey lighten-3"></v-divider>
                                        <v-toolbar card dense class="transparent pt-2">
                                            <v-toolbar-title class="mr-3 subheading">
                                                <span class="body-2">@{{ card.name }}</span><br>
                                            </v-toolbar-title>
                                        </v-toolbar>
                                        <v-card-text class="grey--text">
                                            {{-- <div class="grey--text text--darken-3"><span class="body-2">@{{ card.name }}</span><br></div> --}}
                                            <div class="pt-4">
                                                <span class="star-rating-system" :data-rating="card.rating"></span>
                                                <span class="caption" v-html="card.rating"></span>
                                            </div>
                                        </v-card-text>
                                    </v-card>
                                </a>
                            </v-flex>
                        </v-layout>
                        <v-card-text>
                            <div class="text-xs-center">
                                @include("Theme::partials.pagination")
                                {{-- <v-pagination circle :length="bookings.length" v-model="page" :total-visible="8" class="caption main-paginate"></v-pagination> --}}
                            </div>
                        </v-card-text>
                    </v-flex>
                </v-layout>
            @endif
        </v-container>
    </section>

    @include("Theme::public.footer")
@endsection

@section("footer", "")

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
    <link rel="stylesheet" href="{{ assets('booking/js/jquery.star-rating-svg.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="{{ assets('booking/js/jquery.star-rating-svg.min.js') }}"></script>
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment.min.js"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    filtercat: null,
                    search: {
                        from: moment(new Date()).format('YYYY-MM-DD'),
                        to: moment(new Date()).add(30, 'days').format('YYYY-MM-DD'),
                        dateform: {
                            model: false,
                        }
                    },
                    items: [
                        { title: 'Random' },
                        { title: 'Singles' },
                        { title: 'Random OUTings' },
                        { title: 'Retro' },
                        { title: 'Quick Getaway' },
                        { title: 'Special' },
                    ],
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
                    to: null,
                    dialog: {
                        calendar: false
                    },
                    menu: false,
                    page: 1,
                    bookings: {!! json_encode($resources->toArray()) !!},
                }
            },
            mounted () {
                $('.star-rating-system').each(function (e) {
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
                })
            }
        });
    </script>
@endpush


