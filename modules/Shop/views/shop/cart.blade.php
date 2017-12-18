@extends("Theme::layouts.public")

@section("content")
    <v-container fluid grid-list-lg>
        @include("Theme::partials.banner")

        <v-layout row wrap>
            <v-flex sm12>
                <p class="headline">Cart Page</p>
                <form action="{{ route('shop.payment.paypal') }}" method="POST">
                    {{ csrf_field() }}
                    @foreach (\Anam\Phpcart\Facades\Cart::items() as $i => $item)
                    <input type="text" name="items[0][amount]" value="{{ $item->price }}"><br>
                    <input type="text" name="items[0][quantity]" value="{{ $item->quantity }}"><br>
                    <input type="text" name="items[0][name]" value="{{ 'beach Lotion' }}"><br>
                    @endforeach
                    <input type="text" name="currency" value="PHP">
                    <input type="text" name="total" value="{{ \Anam\Phpcart\Facades\Cart::getTotal() }}">

                    {{-- {{ dd(collect($cart->items)->first()) }} --}}
                    <v-btn ref="uop" type="submit" class="amber white--text"><v-icon left>fa-paypal</v-icon>{{ __('PayPal') }}</v-btn>
                    {{-- <button type="submit" class="elevation-1 yellow darken-1 white--text">PayPal</button> --}}
                </form>
                {{-- <div id="paypal-button"></div> --}}
                @foreach ($cart->items as $item)
                    <v-card>
                        <v-card-text>
                            <div class="subheading">{{ $item->name }}</div>
                            <p>Price: {{ $item->price }}</p>
                        </v-card-text>
                        <v-card-actions>
                            <form action="" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </v-card-actions>
                    </v-card>
                @endforeach
            </v-flex>
        </v-layout>
    </v-container>

@endsection

@push('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        const CLIENT = 'PAYPAL_PRODUCTION_CLIENT_ID';
        const SECRET = 'PAYPAL_PRODUCTION_SECRET';

        paypal.Button.render({
            client: {
              sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
              production: '<insert production client id>'
            },
            env: 'sandbox', // 'sandbox' or 'production',

            commit: true, // Show a 'Pay Now' button

            style: {
                color: 'gold',
                size: 'medium', // small, medium, large, responsive
                shape: 'rect', // rect, pill
                tagline: false,

            },

            payment: function(data, actions) {
                /*
                 * Set up the payment here
                 */
                return actions.payment.create({
                    payment: {
                        transactions: [
                            { amount: { total: '0.1', currency: 'PHP' } },
                        ]
                    }
                });
          },

          onAuthorize: function(data, actions) {
            /*
             * Execute the payment here
             */
            return actions.payment.execute().then(function (payment) {
                console.log('Payment completed', payment);
            });
          },

          onCancel: function(data, actions) {
            /*
             * Buyer cancelled the payment
             */
            console.log('cancelled')
          },

          onError: function(err) {
            /*
             * An error occurred during the transaction
             */
          }
        }, '#paypal-button');
    </script>
@endpush
