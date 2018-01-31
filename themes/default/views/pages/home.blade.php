@extends("Theme::layouts.auth")

@section("head-title", __($application->page->title))

@section("page-title", __($application->page->title))

@section("content")

    {{-- @include("Public::sections.header") --}}


    @include("Public::parts.hero")
    {{-- @include("Public::parts.top-light") --}}

    <div class="py-5">
        @include("Public::parts.categories")
        @include("Public::parts.hotlist")
        @include("Public::parts.video")
        @include("Public::parts.stories")
        @include("Public::parts.review")
        @include("Public::parts.partners")
    </div>

    {{-- @include("Public::parts.bottom-light") --}}

    @include("Public::parts.cta")

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

        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        #video .parallax__content {
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
    </style>
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    menu: false,
                    search: null,
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
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endpush

