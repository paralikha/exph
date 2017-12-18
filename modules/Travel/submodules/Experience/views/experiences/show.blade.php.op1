@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <section id="show" class="white">
        <v-container fluid grid-list-lg>
            <v-layout row wrap align-center justify-center>
                <v-flex lg10 sm12 xs12>
                    <v-breadcrumbs icons divider="chevron_right" class="pl-0" style="justify-content: flex-start;">
                        <v-icon slot="divider">chevron_right</v-icon>
                        <v-breadcrumbs-item
                            v-for="item in crumbs"
                            :key="item.text"
                            :disabled="item.disabled"
                            class="crumbs-items"
                            >
                            <small class="caption">@{{ item.text }}</small>
                        </v-breadcrumbs-item>
                    </v-breadcrumbs>

                    <div class="sidebar hidden-sm-and-down">
                        <v-card class="elevation mb-3">
                            <v-card-media src="{{ assets('frontier/images/public/surf.jpg') }}" height="300px">
                                <v-layout row wrap align-center justify-center>
                                    <v-icon>video_play
                                </v-layout>
                            </v-card-media>
                            <v-card-text>
                                <v-card-actions>
                                    <div class="title"> ₱ 6,000 <br>
                                        <span class="caption grey--text text--darken-1"> per person</span>
                                    </div> <br>
                                    <v-spacer></v-spacer>
                                    <v-btn primary large round class="elevation-1 px-2" href="..\billings">Experience Now</v-btn>
                                </v-card-actions>
                            </v-card-text>

                            <v-divider></v-divider>
                            <v-toolbar class="elevation-0 transparent">
                                <v-toolbar-title>Travel Manager</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text class="text-xs-center">
                                <div class="mb-2">
                                    <v-avatar size="100px">
                                        <img src="{{ assets('frontier/images/placeholder/man.jpg') }}" alt="">
                                    </v-avatar>
                                </div>
                                <span class="body-2 block pb-2">Paul Appleseed</span>
                                <div>
                                    The Travel Manager is the guy who will make sure your road trip will be full of adventures, excitement, tales to tell your grandchildren, epic memories and unforgettable experiences.
                                </div>
                            </v-card-text>
                        </v-card>
                    </div>

                    <v-layout row wrap>
                        <v-flex md12>
                            <div class="content">
                                <v-card class="elevation-0 py-3">
                                    <v-card-text class="pb-0 px-0">
                                        <h4 class="grey--text text--darken-3"><strong>{{ __("Random Road Trip #1") }}</strong></h4>
                                        <h4 class="title fw-400">Life should be filled with sun and water</h4>
                                        <div class="subheading mb-2">Travel with us to a secret weekend getaway! If you are a fan of a cool breeze and remote locations, this trip is for you.</div>

                                        <v-card-actions class="py-0">
                                            <v-avatar size="40px">
                                                <v-icon class="title mr-2">date_range</v-icon>
                                            </v-avatar>
                                            <div>November 24 to 27, 2017 ( 3-day )</div>
                                        </v-card-actions>
                                        <v-card-actions class="py-0">
                                            <v-avatar size="40px">
                                                <v-icon class="title mr-2">schedule</v-icon>
                                            </v-avatar>
                                            <div>8pm, Friday</div>
                                        </v-card-actions>

                                        <div class="pl-2">
                                            <span>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star_half</v-icon>
                                            </span>
                                            <span class="subheading">4.6</span>
                                        </div>

                                        <v-card-actions>
                                            <div>
                                                <span class="caption grey--text text--darken-1">Share on:</span>
                                                <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                                                <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                                                <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-google</v-icon></v-btn>
                                            </div>
                                            <v-spacer></v-spacer>
                                            <v-btn flat class="red--text text-lighten-1"><v-icon>favorite_border</v-icon><span class="pl-2">WishList</span></v-btn>
                                        </v-card-actions>
                                    </v-card-text>
                                </v-card>
                                <v-divider></v-divider>
                                <v-card class="elevation-0 py-3">
                                    <v-card-text class="px-0">
                                        <div class="title mb-2 grey--text text--darken-2">What is going to happen</div>
                                        <div class="body-1 mb-2">A Few Details You Might Want To Know</div>

                                        <div class="pt-3 subheading">
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div> Discover a culture green from Manila</div>
                                            </v-card-actions>
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div> Discover a less touristy place</div>
                                            </v-card-actions>

                                            <div class="body-2 mt-3">Package Includes</div>
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
                                            <div class="body-1 mt-2">Deadline of Payment is November 15, 2017</div>
                                        </div>
                                    </v-card-text>
                                </v-card>
                                <v-divider></v-divider>
                                <v-card class="elevation-0 py-3">
                                    <v-card-text class="px-0">
                                        <div class="title mb-2 grey--text text--darken-2">What to expect</div>
                                        <div class="body-1">A Little Something About This Trip</div>
                                        <div class="pt-3 subheading">
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div> We are going to travel with people we do not know</div>
                                            </v-card-actions>
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div>It will be about memorable moments, big laughs, and team work</div>
                                            </v-card-actions>
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div> Kindly bring some extra cash for food, drinks or some snacks</div>
                                            </v-card-actions>
                                        </div>
                                    </v-card-text>
                                </v-card>
                                <v-divider></v-divider>
                                <v-card class="elevation-0 py-3">
                                    <v-card-text class="px-0">
                                        <div class="title mb-2 grey--text text--darken-2">How to make a reservation</div>
                                        <div class="body-1 mb-2">Our Payment Options</div>
                                        <div class="pt-3">
                                            <div class="body-2">BPI Account Number</div>
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
                                            <div class="body-2">For proof of payment</div>
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
                                            <div class="body-1">You can pay us through credit card via  Paypal's secured payment website</div>
                                        </div>
                                    </v-card-text>
                                </v-card>
                                <v-divider></v-divider>
                                <v-card class="elevation-0 py-3">
                                    <v-card-text class="px-0">
                                        <div class="title mb-2 grey--text text--darken-2">What to bring</div>
                                        <div class="body-1 mb-2">Your Roadtrip Essentials</div>
                                        <div class="pt-3 subheading">
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div>Comfy and reliable shoes for wet, dry, and rocky surfaces</div>
                                            </v-card-actions>
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div>Swim wear</div>
                                            </v-card-actions>
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div>Mosquito Repellent</div>
                                            </v-card-actions>
                                            <v-card-actions class="pa-0 pb-1">
                                                <v-avatar size="40px">
                                                    <v-icon class="title mr-2 green--text text--lighten-1">check_circle</v-icon>
                                                </v-avatar>
                                                <div>Lots of sunblock</div>
                                            </v-card-actions>
                                        </div>
                                    </v-card-text>
                                </v-card>
                                <v-divider></v-divider>
                                <v-card class="elevation-0 py-3">
                                    <v-list subheader class="py-0">
                                        <v-subheader>Frequently Asked Questions</v-subheader>
                                        <v-list-tile avatar ripple @click="">
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
                                <v-divider></v-divider>
                                <v-card class="elevation-0 py-3">
                                    <v-card-text class="px-0">
                                        <div class="title mb-2 grey--text text--darken-2">1 Review
                                            <span>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                <v-icon class="deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            </span>
                                        </div>
                                        <div class="body-1 mb-2"> Lorem ipsum dolor cit amet</div>
                                        <div class="pt-3">
                                            <v-card-actions class="mb-3">
                                                <v-avatar size="50px" class="mr-4">
                                                    <img src="{{ assets('frontier/images/placeholder/woman.jpg') }}" alt="">
                                                </v-avatar>
                                                <div class="body-1">
                                                    <span class="body-2 block">Veronica</span>
                                                    <span class="body-1 block">November 14, 2017</span>
                                                </div>
                                                <v-spacer></v-spacer>
                                                <v-btn icon v-tooltip:bottom="{html: 'Report Review'}"><v-icon class="title">fa fa-flag-o</v-icon></v-btn>
                                            </v-card-actions>
                                            <div class="subheading">
                                                Definitely value for money! Very beautiful view in amazing location. Paul Appleseed was also very helpful. Very recommended!
                                            </div>
                                        </div>
                                    </v-card-text>
                                </v-card>
                            </div>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
            <v-layout row wrap align-center justify-center>
                <v-flex lg10 sm12 xs12>
                    <v-divider></v-divider>
                    <v-card class="elevation-0 py-3">
                        <v-card-text class="px-0">
                            <div class="title mb-2 grey--text text--darken-2">Similar Listings</div>
                            <div class="body-1 mb-2"> Lorem ipsum dolor cit amet</div>
                            <div class="pt-3">
                                <v-layout row wrap align-center>
                                    <v-flex xs12 sm4 md3 v-for="card in experiences">
                                        <a href="\experiences/show" ripple class="td-n">
                                            <v-card class="elevation-1 c-lift">
                                                <v-card-media
                                                    height="180px"
                                                    :src="card.src"
                                                    class="grey lighten-4">
                                                    <div class="text-xs-right" style="width: 100%;">
                                                        <v-btn large icon class="mr-3">
                                                            @include("Experience::components.wishlist")
                                                        </v-btn>
                                                        <v-chip label class="ma-0 white--text deep-orange darken-1" v-html="card.price" style="position: absolute; bottom: 15px; right: 0;"></v-chip>
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
                                                        <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                        <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                        <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                        <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                                        <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star_half</v-icon>
                                                        4.6
                                                    </div>
                                                </v-card-text>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                </v-layout>
                            </div>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>

        {{-- mobile viewport --}}
        <v-card class="elevation-1 fixed-nav hidden-md-and-up" style="z-index: 3;">
            <v-divider></v-divider>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-card-actions>
                        <v-card-text class="py-2">
                            <div class="subheading"><strong>₱ 6,000</strong> <span class="body-1">per person</span></div>
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
                                    <v-list two-line subheader>
                                        <v-list-tile avatar>
                                            <v-list-tile-content>
                                                <v-list-tile-title class="fw-500">Full Refund</v-list-tile-title>
                                                <v-list-tile-sub-title>Before 2 weeks</v-list-tile-sub-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile avatar>
                                            <v-list-tile-content>
                                                <v-list-tile-title class="fw-500">Half Refund</v-list-tile-title>
                                                <v-list-tile-sub-title>5 to 10 business days</v-list-tile-sub-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile avatar>
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
                        <v-card-text class="py-2 text-xs-right">
                            <v-btn large primary round class="elevation-1 px-2" href="..\billings">Experience Now</v-btn>
                        </v-card-text>
                    </v-card-actions>
                </v-flex>
            </v-layout>
        </v-card>
    </section>
    @include("Public::sections.footer")
@endsection


@push('css')
    <style>
        #show .crumbs-items:first-child .breadcrumbs__item {
            padding-left: 0;
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
                    crumbs: [
                        {
                            text: 'Experiences',
                            disabled: false
                        },
                        {
                            text: 'Random Road Trip #1',
                            disabled: false
                        },
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
