@extends("Theme::layouts.admin")

@section("head-title", __("Profile"))

@section("content")
    @include("Profile::partials.profile-banner")

    @include("Theme::partials.banner")
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card class="elevation-1">
                    <v-card-text class="mb-3">
                        <v-subheader class="px-0">{{ __('Basic Information') }}</v-subheader>
                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Full Name') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->fullname }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Email Address') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->email }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Username') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->username }}
                            </v-flex>
                        </v-layout>
                    </v-card-text>

                    <v-card-text>
                        <v-subheader class="px-0">{{ __('Other Details') }}</v-subheader>
                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Gender') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->detail->gender }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Birthday') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->detail->birthday }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Home Address') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->detail->address }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Phone') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->detail->phone }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Mobile') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->detail->mobile }}
                            </v-flex>
                        </v-layout>

                        <v-layout row wrap>
                            <v-flex xs4>
                                <div class="grey--text">{{ __('Tee Shirt Size') }}</div>
                            </v-flex>
                            <v-flex xs8>
                                {{ $resource->detail->shirt_size }}
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
        /**/
    </style>
@endpush

@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        items: {!! json_encode(@$resource) !!},
                    },
                };
            },
        });
    </script>
@endpush
