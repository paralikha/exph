@extends("Theme::layouts.auth")

@section("head-title", __("Oops! Something went wrong"))

@section("content")

    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card flat class="transparent">
                    <v-layout row wrap justify-center align-top>
                        <v-flex lg6 md8 sm10 xs12>
                            <v-card class="elevation-1 subheading">
                                <v-card-text>
                                    <img src="{{ assets('frontier/images/public/logo_icon.png') }}" alt="" width="80">
                                </v-card-text>
                                <v-card-text class="text-xs-center pb-4 pt-0">
                                    <v-icon error class="display-3">close</v-icon>
                                    <div class="subheading error--text"><strong>{{ __('Oops! Something went wrong') }}</strong></div>
                                    <div class="subheading grey--text">{{ __('An unknown error occured. Please try again.') }}</div>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn primary class="elevation-1" href="{{ route('experiences.all') }}">{{ __('Go Back') }}</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>

@endsection
