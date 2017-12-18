@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1">
        <v-card-media src="{{ assets('frontier/images/placeholder/gradient.png') }}" height="300">
            <v-layout
                column
                align-center
                justify-center
                class="white--text"
                >
                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%; top: 0;"></div>
                <v-card dark class="elevation-0 transparent text-xs-center">
                    <v-card-text>
                        <h3><strong>{{ __("Frequently Asked Questions") }}</strong></h3>
                    </v-card-text>
                </v-card>
            </v-layout>
        </v-card-media>
    </v-card>
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg7 md8 sm12 xs12>
                <v-layout row wrap>
                    <v-flex xs12>
                        <v-card class="elevation-1">
                            <v-toolbar class="elevation-0 white">
                                <v-toolbar-title>Questions</v-toolbar-title>
                            </v-toolbar>
                            <v-divider></v-divider>
                            <div class="pa-3">
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">You really don’t tell the destination?</div>
                                    <div class="pt-3 subheading">
                                        Yes, we really do not reveal the destination until we get there or during the departure. Sometimes you can coax Gian to get excited and he might slip and tell you the destination. He is getting better at hiding it but his weakness is Milk Tea.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">What if I have been to that destination?</div>
                                    <div class="pt-3 subheading">
                                        Like we said, we value the EXPERIENCE more than the destination. We are a bunch of guys and gals who always have this sense of wonder and excitement even if we have been in a destination more than once. Traveling with a new set of people will always be different. And Mother Nature always seem to surprise us with new discoveries and experiences.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">What is the transport for the Random Road Trip?</div>
                                    <div class="pt-3 subheading">
                                        We’ve been on tricycles, 4x4s, dump trucks, hummers, and even small charter planes! You can check out our many crazy rides here – The Many Crazy Rides in Our Random Road Trips
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">Is it safe and secure?</div>
                                    <div class="pt-3 subheading">
                                       We value everyone’s safety and security. We coordinate always with the local tourism offices because one of our goals is to be help small communities within the local government. We have a first aid kit.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">What do I bring to the Road Trip?</div>
                                    <div class="pt-3 subheading">
                                        Just bring some extra clothes, swimming attire, towel, snacks, water, sunscreen, camera, and some cash for entrance and food.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">What are the usual activities? </div>
                                    <div class="pt-3 subheading">
                                         You can expect to get wet, to be sun kissed, to meet locals, to eat unusual food. Sometimes if we are lucky, we even get to see shooting stars.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">What happens if you guys don’t fill the slots?</div>
                                    <div class="pt-3 subheading">
                                           We do have a minimum number of road trippers for a road trip to push through. In those cases when the slots are not filled: (1) we send an email informing participants of the situation, and (2) we either ask the participant wishes to join another road trip or (3) we do a complete refund as soon as we get their bank details.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">What is your refund policy?</div>
                                    <div class="pt-3 subheading">
                                        <div class="mb-3">Please take note of our refund policy as follows:</div>
                                        <div class="mb-2"><strong>Full refund</strong> if you book before 2 weeks (More than 10 business days) before the trip</div>
                                        <div class="mb-2"> <strong>Half refund</strong> within 10 business days but more than 5 days before the trip</div>
                                        <div class="mb-2"><strong>No refund</strong> if 5 days or less before the trip</div>
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">Where can I contact the organizer with any questions?</div>
                                    <div class="pt-3 subheading">
                                        <div class="mb-3">You can get in touch with Jeff or Gian through the following methods:</div>
                                        <v-card-actions class="pa-0 pb-1">
                                            <v-avatar size="40px">
                                                <v-icon class="title mr-2 primary--text">phone_iphone</v-icon>
                                            </v-avatar>
                                            <div> 0917- 572-7527 (Jeff)  or 0917-563-9692 (Gian)</div>
                                        </v-card-actions>
                                        <v-card-actions class="pa-0 pb-1">
                                            <v-avatar size="40px">
                                                <v-icon class="title mr-2 primary--text">phone</v-icon>
                                            </v-avatar>
                                            <div> (+632) 710 5641</div>
                                        </v-card-actions>
                                        <v-card-actions class="pa-0 pb-1">
                                            <v-avatar size="40px">
                                                <v-icon class="title mr-2 primary--text">email</v-icon>
                                            </v-avatar>
                                            <div> jeffrey@experience.ph or giancarlo@experience.ph</div>
                                        </v-card-actions>
                                    </div>
                                </v-card-text>
                            </div>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    @include("Public::sections.footer")
@endsection

@push('css')
    <style>
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
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

                }
            },
        });
    </script>
@endpush
