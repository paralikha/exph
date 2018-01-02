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
                                                <div class="body-2 mb-1">About Experience Philippines</div>
                                                <div class="caption mb-3">
                                                    Experience Philippines is about UNIQUE ADVENTURES. We are a travel group that organizes RANDOM ROAD TRIPS where the destination is a SECRET and the activities are a SURPRISE.
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                    <v-flex sm6 xs12 class="hidden-xs-only">
                                        <v-card dark class="elevation-0 transparent">
                                            <v-card-text class="body-1">
                                                <v-layout row wrap>
                                                    <v-flex sm5 offset-sm1>
                                                        <div class="body-2 mb-2 white--text">Experience Philippines</div>
                                                        <div class="mb-1">
                                                        <a href="\about" class="td-n grey--text">
                                                            Who We Are
                                                        </a>
                                                        </div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Crowd Funding
                                                        </a></div>
                                                        <div class="mb-1"><a href="\stories" class="td-n grey--text">
                                                            Stories From The Road
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Privacy Policy
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Contact Us
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Sponsorships Opportunities
                                                        </a></div>
                                                    </v-flex>
                                                    <v-flex sm5 offset-sm1>
                                                        <div class="body-2 mb-2 white--text">Road Trips</div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Random Road Trips
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Singles Road Trips
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Random OUTings
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Retro Road Trips
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Quick Getaway
                                                        </a></div>
                                                        <div class="mb-1"><a href="" class="td-n grey--text">
                                                            Special Road Trips
                                                        </a></div>
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
                                                        <a href="" class="td-n body-1 white--text">Home</a>
                                                    </v-flex>
                                                    <v-flex xs3>
                                                        <a href="" class="td-n body-1 white--text">About Us</a>
                                                    </v-flex>
                                                    <v-flex xs3>
                                                        <a href="" class="td-n body-1 white--text">Stories</a>
                                                    </v-flex>
                                                    <v-flex xs3>
                                                        <a href="" class="td-n body-1 white--text">Policies</a>
                                                    </v-flex>
                                                </v-layout>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                    <v-flex sm3 xs12>
                                        <v-card dark class="elevation-0 transparent">
                                            <v-card-text class="caption grey--text">
                                                <div class="body-2 mb-2 white--text">Contact Us</div>
                                                {{-- <v-btn outline block class="mb-2 mx-0 grey--text">Ask Us</v-btn> --}}
                                                <v-dialog v-model="dialog.contact" persistent width="500px">
                                                    <v-btn outline block class="mb-2 mx-0 grey--text" slot="activator">Ask Us</v-btn>
                                                    <v-card>
                                                        <v-toolbar dark class="blue elevation-0">
                                                            <v-toolbar-title>Contact Us</v-toolbar-title>
                                                        </v-toolbar>
                                                        <v-card-text>
                                                            <v-container grid-list-md>
                                                                <v-layout wrap>
                                                                    <v-flex xs12>
                                                                        <v-text-field label="Full Name" required></v-text-field>
                                                                    </v-flex>
                                                                    <v-flex xs12>
                                                                        <v-text-field label="Email" required></v-text-field>
                                                                    </v-flex>
                                                                    <v-flex xs12>
                                                                        <v-text-field label="Mobile Number" required></v-text-field>
                                                                    </v-flex>
                                                                </v-layout>
                                                            </v-container>
                                                            <small>*indicates required field</small>
                                                        </v-card-text>
                                                        <v-card-actions>
                                                            <v-btn color="blue darken-1" flat @click.native="dialog.contact = false">Cancel</v-btn>
                                                            <v-spacer></v-spacer>
                                                            <v-btn class="primary--text" flat @click.native="dialog.contact = false">Submit</v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                                </v-dialog>
                                                <div>Mobile: +63 917 563 9692</div>
                                                <div>Landline: +632 710 5641</div>
                                                <div>Email: giancarlo@experience.ph</div>
                                                <div>Unit 10G Le Grande Tower 2, Eastwood City, Bagumbayan, Quezon City, PHILIPPINES 1110.</div>
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
                            <div class="caption grey--text">© 2017 EXPERIENCE PHILIPPINES</div>
                            <v-spacer></v-spacer>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-youtube</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-instagram</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-pinterest</v-icon></v-btn>
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
    class="elevation-1"
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
