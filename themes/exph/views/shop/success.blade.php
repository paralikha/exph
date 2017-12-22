@extends("Theme::layouts.auth")

@section("head-title", __("Successfully Booked {$order->experience->name}"))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>

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
                                    <v-icon success class="display-3">check_circle</v-icon>
                                    <div class="subheading success--text"><strong>Payment Successful</strong></div>
                                    <div class="body-1 grey--text">Your payment has been processed! Details of the transaction are included below.</div>
                                </v-card-text>
                                <v-divider></v-divider>
                                <v-card-text>
                                    <div class="text-xs-center">
                                    </div>
                                    <v-layout row wrap>
                                        <v-flex xs6>
                                            <div><strong>{{ __('Status') }}:</strong> {{ ucfirst($order->status) }}</div>
                                            <div><strong>{{ __('Date') }}</strong>: Tue 19 December 2017</div>
                                        </v-flex>
                                        <v-flex xs6>
                                            <div><strong>{{ __('PAYMENT ID') }}</strong>:</div>
                                            <div class="subheading">{{ $order->payment_id }}</div>
                                        </v-flex>
                                    </v-layout>
                                </v-card-text>
                                <v-divider></v-divider>


                                <v-toolbar class="elevation-0 transparent">
                                    <v-toolbar-title>{{ __('Payment Details') }}</v-toolbar-title>
                                </v-toolbar>

                                <v-card-text>
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text body-1"><strong>{{ __('Experience Name') }}</strong></div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="body-1">{{ $order->experience->name }}</div>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text body-1"><strong>{{ __('Booking Date') }}</strong></div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="body-1">{{ $order->experience->date }}</div>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text body-1"><strong>{{ __('Payment Type') }}</strong></div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="body-1">{{ $order->type }}</div>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text body-1"><strong>{{ __('Payer ID') }}</strong></div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="body-1">{{ $order->payer_id }}</div>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text body-1"><strong>{{ __('Total Amount Paid') }}</strong></div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="body-1">{{ $order->amount }}</div>
                                        </v-flex>
                                    </v-layout>
                                </v-card-text>

                                <v-toolbar class="elevation-0 transparent">
                                    <v-toolbar-title>{{ __('Guests Details') }}</v-toolbar-title>
                                </v-toolbar>
                                <v-card-text class="pb-5">
                                    @foreach ($order->meta as $metadata)
                                        <v-layout row wrap>
                                            <v-flex xs4>
                                                <div class="body-1">{{ $metadata['name'] }}</div>
                                            </v-flex>
                                        </v-layout>
                                    @endforeach
                                </v-card-text>

                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
    </style>
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        mixins.push({
            data () {
                return {
                    bulk: {
                        destroy: {
                            model: false,
                        },
                        searchform: {
                            model: false,
                        },
                    },
                    urls: {
                        transactions: {
                            api: {
                                clone: '{{ route('api.transactions.clone', 'null') }}',
                                destroy: '{{ route('api.transactions.destroy', 'null') }}',
                            },
                            show: '{{ route('transactions.show', 'null') }}',
                            edit: '{{ route('transactions.edit', 'null') }}',
                            destroy: '{{ route('transactions.destroy', 'null') }}',
                        },
                    },
                };
            },
            methods: {
                get () {
                    //
                },

                destroy (url, query) {
                    var self = this;
                    this.api().delete(url, query)
                        .then((data) => {
                            console.log('lops',data);
                            // self.get('{{ route('api.transactions.all') }}');
                            self.snackbar = Object.assign(self.snackbar, data);
                            self.snackbar.model = true;
                        });
                },
            },
            mounted () {
                let self = this;
            }
        })
    </script>
@endpush
