@extends("Theme::layouts.admin")

@section("content")

    <v-container fluid>
        @include("Theme::partials.banner")
        <v-layout row wrap>
            <v-flex sm6 md8 xs12 offset-md2>

                <v-card class="mb-3 elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __('Shop Settings') }}</v-toolbar-title>
                    </v-toolbar>

                    <form action="{{ route('settings.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-subheader><v-icon left>fa-paypal</v-icon>&nbsp;{{ __('PayPal Settings') }}</v-subheader>
                        <v-card-text>
                            <input type="hidden" name="shop_payment_paypal_sandboxmode" :value="resource.item.shop.payment.paypal.sandboxmode">
                            <v-switch v-model="resource.item.shop.payment.paypal.sandboxmode" value="true" label="{{ __('Sandbox Mode') }}" hint="{{ __('Toggle this on for testing purposes only. You will lose potential clients if left on at the production server.') }}" persistent-hint></v-switch>
                            <template v-if="resource.item.shop.payment.paypal.sandboxmode">
                                <v-text-field
                                    label="{{ __('Sandbox PayPal Client ID') }}"
                                    name="shop_payment_paypal_sandbox_client_id"
                                    input-group
                                    hide-details
                                    value="{{ settings('shop_payment_paypal_sandbox_client_id') }}"
                                ></v-text-field>
                                <v-text-field
                                    label="{{ __('Sandbox PayPal Secret') }}"
                                    name="shop_payment_paypal_sandbox_secret"
                                    input-group
                                    hide-details
                                    value="{{ settings('shop_payment_paypal_sandbox_secret') }}"
                                ></v-text-field>
                            </template>
                            <v-text-field
                                label="{{ __('Live PayPal Client ID') }}"
                                name="shop_payment_paypal_client_id"
                                input-group
                                hide-details
                                value="{{ settings('shop_payment_paypal_client_id') }}"
                            ></v-text-field>
                            <v-text-field
                                label="{{ __('Live PayPal Secret') }}"
                                name="shop_payment_paypal_secret"
                                input-group
                                hide-details
                                value="{{ settings('shop_payment_paypal_secret') }}"
                            ></v-text-field>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn type="submit" primary>{{ __('Save') }}</v-btn>
                        </v-card-actions>
                    </form>

                </v-card>

            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        item: {
                            shop: {
                                payment: {
                                    paypal: {
                                        sandboxmode: '{{ settings('shop_payment_paypal_sandboxmode', '1') }}',
                                    }
                                }
                            }
                        },
                        radios: {
                            membership: {
                                items: {!! json_encode(config('auth.registration.modes', [])) !!},
                                model: '{{ settings('site_membership', 2) }}',
                            },
                            date_format: {
                                custom: 'm/d/Y',
                                model: '{{ @$resource->date_format ? $resource->date_format : settings('date_format', 'F d, Y') }}'
                            },
                            time_format: {
                                custom: 'H:i:s a',
                                model: '{{ @$resource->time_format ? $resource->time_format : settings('time_format', 'h:i A') }}'
                            }
                        },
                    },
                };
            },
        });
    </script>
@endpush
