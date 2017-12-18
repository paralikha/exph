@extends("Theme::layouts.auth")

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <v-card class="banner elevation-1">
        <v-parallax class="elevation-0" height="450" src="{{ assets('frontier/images/public/car.jpg') }}">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("MEET THE TEAM") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{__("Lorem Ipsum Dolor Cit Amet")}}</h5>
            </v-layout>
        </v-parallax>
    </v-card>

    <section id="hotlist" class="my-5">
        <v-container fluid grid-list-lg>
            <v-layout row wrap align-center justify-center>
                <v-flex lg10 md12 sm12 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("TRAVEL MANAGERS") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
                    </v-card-text>

                    <v-layout row wrap>
                        <v-flex xs12>
                            <div class="ssl-1">
                                <section class="regular slider ssl-2 my-2" >
                                    <div class="my-2 ssl-3" v-for="card in exp">
                                        <div class="ssl-4">
                                            <div class="ssl-5 mb-3">
                                                <v-card class="elevation-1" height="100%">
                                                    <v-card-media
                                                        height="250px"
                                                        :src="card.src"
                                                        class="grey lighten-4">
                                                    </v-card-media>
                                                    <v-divider class="grey lighten-3"></v-divider>
                                                    <v-toolbar card dense class="transparent pt-2">
                                                        <v-toolbar-title class="mr-3 subheading">
                                                            <span class="subheading"><strong>Sheena Peña</strong></span><br>
                                                            <span class="body-1">Travel Manager</span><br>
                                                        </v-toolbar-title>
                                                    </v-toolbar>
                                                    <v-card-text class=" pt-4">
                                                        <div class="subheading">Sheena is a combination of an Energizer Bunny and a chill cat during road trips. Although she prefers to stay behind the spotlight, she can quickly stand out with her quirky personality and eagerness to explore hipster locations. After hearing Jennylyn Mercado say that 'funny can also be sexy', Sheena is continuously undergoing humor training.</div>
                                                    </v-card-text>
                                                    <v-card-actions>
                                                        <v-btn icon><v-icon>fa fa-facebook</v-icon></v-btn>
                                                        <v-btn icon><v-icon>fa fa-twitter</v-icon></v-btn>
                                                        <v-btn icon><v-icon>fa fa-pinterest</v-icon></v-btn>
                                                    </v-card-actions>
                                                </v-card>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                    </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    @include("Public::sections.footer")
@endsection

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ assets('frontier/slick/slick/slick-theme.css') }}">
    <style>
        /* slickslider */
        .ssl-1 {  /* ._e296pg */
            position: relative;
        }
        .ssl-2 { /* _11iocrd2 */
            margin-left: -8px !important;
            margin-right: -8px !important;
            /*overflow: hidden !important;*/
            /*overflow-y: hidden !important;*/
        }
        .ssl-3 { /* _1ob6ca33 */
            /*margin-bottom: 0px !important;*/
            padding: 0px !important;
            overflow: visible !important;
        }
        .ssl-4 { /* _1yttouf2 */
            /*display: inline-block !important;*/
            vertical-align: top !important;
            white-space: normal !important;
        }
        .ssl-5 { /* _qgh1p4 */
            padding-left: 8px !important;
            padding-right: 8px !important;
        }
        .slider {
            height: 100%;
        }
        .slick-slide {
            /*margin: 8px 16px 8px 0;*/
        }
        .slick-slide img {
            width: 100%;
        }
        .slick-prev:before,
        .slick-next:before {
            color: black;
        }
        .slick-slide {
            transition: all ease-in-out .3s;
        }
        .slick-next {
            background: #fff !important;
            right: -10px;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            box-shadow: 0 1px 3px rgba(0,0,0,.2),0 1px 1px rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)!important;
        }
        .slick-prev {
            background: #fff !important;
            left: -10px;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            z-index: 1;
            box-shadow: 0 1px 3px rgba(0,0,0,.2),0 1px 1px rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)!important;
        }
        /* slickslider */
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
                    exp: [
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
                    ],
                }
            },
        });
    </script>
@endpush


@push('js')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{ assets('frontier/slick/slick/slick.js') }}"></script>
    <script>
        $(window).scroll(function () {
            if ( $(this).scrollTop() > 600 && !$('header').hasClass('open') ) {
                $('header').addClass('open');
                $('header').slideDown(200);
            } else if ( $(this).scrollTop() <= 600 ) {
                $('header').removeClass('open');
                $('header').slideUp(200);
            }
        });
        $(document).on('ready', function() {
            $(".regular").slick({
                dots: false,
                centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
            });
        });
    </script>
@endpush
