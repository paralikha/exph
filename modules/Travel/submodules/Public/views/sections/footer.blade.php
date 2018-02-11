<footer>
    <v-layout row wrap>
        <v-flex xs12>
            <v-card class="elevation-0 black">
                <div class="py-5">
                    <v-layout row wrap>
                        <v-flex lg10 offset-lg1 md12 sm12>
                            <v-container fill-height fluid class="pa-0 white--text">
                                <v-layout row wrap align-top justify-top>
                                    <v-flex sm3 xs12 class="hidden-xs-only">
                                        <v-card dark class="elevation-0 transparent">
                                            <v-card-text class="grey--text pb-0">
                                                <img src="{{ assets('frontier/images/public/footer.png') }}" alt="" width="120">
                                                <div class="body-2 mb-1">{!! settings('site_title') !!}</div>
                                                <div class="caption mb-3">
                                                    {!! settings('site_tagline') !!}
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                    <v-flex sm6 xs12 class="hidden-xs-only">
                                        <v-card dark class="elevation-0 transparent">
                                            <v-card-text class="body-1">
                                                <v-layout row wrap>
                                                    <v-flex sm5 offset-sm1>
                                                        <div class="body-2 mb-2 white--text">{!! settings('site_title') !!}</div>
                                                        <div class="mb-1">
                                                        <a href="\about" class="td-n grey--text">
                                                            {{ __('Who We Are') }}
                                                        </a>
                                                        </div>
                                                        <div class="mb-1"><a href="\crowd-funding" class="td-n grey--text">
                                                            {{ __('Crowd Funding') }}
                                                        </a></div>
                                                        <div class="mb-1"><a href="\stories" class="td-n grey--text">
                                                            {{ __('Stories From The Road') }}
                                                        </a></div>
                                                        <div class="mb-1"><a href="\privacy-policy" class="td-n grey--text">
                                                            {{ __('Privacy Policy') }}
                                                        </a></div>
                                                        <div class="mb-1"><a href="\partnership" class="td-n grey--text">
                                                            {{ __('Sponsorships Opportunities') }}
                                                        </a></div>
                                                        <div class="mb-1"><a href="\meet-the-team" class="td-n grey--text">
                                                            {{ __('Meet the Team') }}
                                                        </a></div>
                                                    </v-flex>
                                                    <v-flex sm5 offset-sm1>

                                                        <div class="body-2 mb-2 white--text">{{ __('Site Map') }}</div>
                                                        @foreach (get_navmenus('main-menu') as $menu)
                                                            <div class="mb-1"><a href="{{ $menu->url }}" class="td-n grey--text">
                                                                {{ __($menu->title) }}
                                                            </a></div>
                                                        @endforeach

                                                    </v-flex>
                                                </v-layout>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                    <v-flex xs12 class="hidden-sm-and-up">
                                        <v-card dark class="elevation-0 transparent">
                                            <v-card-text>
                                                <v-layout row justify-space-between>
                                                    <v-flex xs3>
                                                        <a href="\home" class="td-n body-1 white--text">{{ __('Home') }}</a>
                                                    </v-flex>
                                                    <v-flex xs3>
                                                        <a href="\about" class="td-n body-1 white--text">{{ __('About Us') }}</a>
                                                    </v-flex>
                                                    <v-flex xs3>
                                                        <a href="\stories" class="td-n body-1 white--text">{{ __('Stories') }}</a>
                                                    </v-flex>
                                                    <v-flex xs3>
                                                        <a href="\privacy-policy" class="td-n body-1 white--text">{{ __('Policies') }}</a>
                                                    </v-flex>
                                                </v-layout>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                    <v-flex sm3 xs12>
                                        <v-card dark class="elevation-0 transparent">
                                            <v-card-text class="caption grey--text">
                                                <v-dialog v-model="dialog.contact" persistent width="500px">
                                                    <v-btn outline class="mb-2 mx-0 grey--text" slot="activator">Ask Us</v-btn>
                                                    <form action="{{ route('contactus.submit') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <v-card>
                                                            <v-toolbar dark class="blue elevation-0">
                                                                <v-toolbar-title>{{ __('Contact Us') }}</v-toolbar-title>
                                                            </v-toolbar>
                                                            <v-card-text>
                                                                <v-container grid-list-md>
                                                                    <v-layout wrap>
                                                                        <v-flex xs12>
                                                                            <v-text-field name="fullname" label="Full Name" required></v-text-field>
                                                                        </v-flex>
                                                                        <v-flex xs12>
                                                                            <v-text-field type="email" name="email" label="Email" required></v-text-field>
                                                                        </v-flex>
                                                                        <v-flex xs12>
                                                                            <v-text-field name="mobile_number" label="Mobile Number" required></v-text-field>

                                                                            <v-text-field textarea name="message" label="Message" required></v-text-field>
                                                                        </v-flex>
                                                                    </v-layout>
                                                                </v-container>
                                                                <small>*indicates required field</small>
                                                            </v-card-text>
                                                            <v-card-actions>
                                                                <v-btn color="blue darken-1" flat @click.native="dialog.contact = false">Cancel</v-btn>
                                                                <v-spacer></v-spacer>
                                                                {{-- @click="dialog.contact = false" --}}
                                                                <v-btn type="submit" class="primary--text" flat>Submit</v-btn>
                                                            </v-card-actions>
                                                        </v-card>
                                                    </form>
                                                </v-dialog>
                                                <div>Mobile: {!! settings('business_mobile') !!}</div>
                                                <div>Landline: {!! settings('business_landline') !!}</div>
                                                <div>Email: {!! settings('site_email') !!}</div>
                                                <div>{!! settings('business_address') !!}</div>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-flex>
                    </v-layout>
                </div>

                <v-layout row wrap>
                    <v-flex lg10 offset-lg1 md12 sm12>
                        <v-divider class="grey darken-3"></v-divider>
                        <v-card-actions>
                            <div class="caption grey--text">{!! settings('site_copyright') !!}</div>
                            <v-spacer></v-spacer>
                            <v-btn href="{{ settings('social_links', '', 'facebook.url') }}" icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                            <v-btn href="{{ settings('social_links', '', 'twitter.url') }}" icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                            <v-btn href="{{ settings('social_links', '', 'youtube.url') }}" icon class="social"><v-icon class="subheading grey--text">fa fa-youtube</v-icon></v-btn>
                            <v-btn href="{{ settings('social_links', '', 'instagram.url') }}" icon class="social"><v-icon class="subheading grey--text">fa fa-instagram</v-icon></v-btn>
                            <v-btn href="{{ settings('social_links', '', 'pinterest.url') }}" icon class="social"><v-icon class="subheading grey--text">fa fa-pinterest</v-icon></v-btn>
                        </v-card-actions>
                    </v-flex>
                </v-layout>
            </v-card>
        </v-flex>
    </v-layout>
</footer>

<v-btn
    fixed
    dark
    fab
    bottom
    right
    primary
    dark
    class="elevation-1 mr-4 mb-4"
    id="back-to-top"
    >
    <v-icon>keyboard_arrow_up</v-icon>
</v-btn>

@push('css')
    <style>
        footer a:hover,
        .social:hover {
            color: #ff6600 !important;
        }

        #back-to-top {
            transition: opacity 0.2s ease-out;
            opacity: 0;
            z-index: 2;
        }
        #back-to-top.show {
            opacity: 1;
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
                    dialog: {
                        contact: false,
                    }
                }
            },
        });
    </script>
@endpush


@push('js')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script>
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 400);
            });
        }
    </script>
@endpush
