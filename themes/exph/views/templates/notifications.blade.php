{{--
Template Name: Notifications Template
Description: A page for all experiences.
Author: Princess Ellen Alto
Version: 1.0
--}}

@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

    <v-container fluid grid-list-lg>
        <v-layout row wrap justify-center align-top>
            <v-flex lg10 md12 xs12>
                <v-layout row wrap>
                    <v-flex md3 sm4 xs12>
                        <v-card class="elevation-1">
                            <v-list class="py-0">
                                <v-list-tile ripple href="\notifications">
                                    <v-list-tile-action>
                                        <v-icon primary>notifications</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="primary--text">
                                            {{ __('Notifications') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile ripple href="\transactions">
                                    <v-list-tile-action>
                                        <v-icon>credit_card</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{ __('Transaction History') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile ripple href="\wishlist">
                                    <v-list-tile-action>
                                        <v-icon>favorite</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{ __('Wishlist') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-flex>

                    <v-flex md9 sm8 xs12>
                        <v-layout row wrap>
                            <v-flex md6 xs12>
                                <v-card class="mb-3 elevation-1">
                                    <v-toolbar class="elevation-0">
                                        <v-toolbar-title>Messages</v-toolbar-title>
                                    </v-toolbar>
                                    <v-card-text>
                                        <p>Receive messages from hosts and guests.</p>
                                        <v-checkbox
                                            label="Email"
                                            color="success"
                                            v-model="n1"
                                            class="pt-0">
                                        </v-checkbox>
                                        <v-checkbox
                                            label="Push notifications"
                                            color="success"
                                            v-model="n2"
                                            class="pt-0">
                                        </v-checkbox>
                                        <v-checkbox
                                            label="Text messages"
                                            color="success"
                                            v-model="n3"
                                            class="pt-0">
                                        </v-checkbox>
                                    </v-card-text>
                                </v-card>
                                <v-card class="mb-3 elevation-1">
                                    <v-toolbar class="elevation-0">
                                        <v-toolbar-title>Messages</v-toolbar-title>
                                    </v-toolbar>
                                    <v-card-text>
                                        <p>Receive messages from hosts and guests.</p>
                                        <v-checkbox
                                            label="Email"
                                            color="success"
                                            v-model="n1"
                                            class="pt-0">
                                        </v-checkbox>
                                        <v-checkbox
                                            label="Push notifications"
                                            color="success"
                                            v-model="n2"
                                            class="pt-0">
                                        </v-checkbox>
                                        <v-checkbox
                                            label="Text messages"
                                            color="success"
                                            v-model="n3"
                                            class="pt-0">
                                        </v-checkbox>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                            <v-flex md6 xs12>
                                <v-card class="mb-3 elevation-1">
                                    <v-toolbar class="elevation-0">
                                        <v-toolbar-title>Reminders and suggestions</v-toolbar-title>
                                    </v-toolbar>
                                    <v-card-text>
                                        <p>Receive reminders, helpful tips to improve your trip, and other messages related to your activities on Airbnb.</p>
                                        <v-checkbox
                                            label="Email"
                                            color="success"
                                            v-model="n1"
                                            class="pt-0">
                                        </v-checkbox>
                                        <v-checkbox
                                            label="Push notifications"
                                            color="success"
                                            v-model="n2"
                                            class="pt-0">
                                        </v-checkbox>
                                        <v-checkbox
                                            label="Text messages"
                                            color="success"
                                            v-model="n3"
                                            class="pt-0">
                                        </v-checkbox>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    @include("Public::sections.footer")
@endsection





@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    n1: null,
                    n2: null,
                    n3: null,
                }
            },
        });
    </script>
@endpush

