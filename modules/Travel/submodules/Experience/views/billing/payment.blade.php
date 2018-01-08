@extends("Theme::layouts.public")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Theme::partials.navigation")
        </v-toolbar>
    </v-card>

    <v-container fluid grid-list-lg>
        <v-layout row wrap align-top justify-center>
            <v-flex lg8 md10 sm10 xs12>
                <v-layout row wrap align-top justify-center>
                    <v-flex md8 xs12>
                        @if (! user())
                        <v-card class="elevation-1">
                            <v-toolbar flat class="transparent">
                                <v-toolbar-title>{{ __('Login') }}</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text>
                                <span class="grey--text caption">{{ __('You must login to view this Order.') }}</span>
                                <form action="{{ route('login.login') }}" method="POST">
                                    {{ csrf_field() }}
                                    <v-text-field
                                        :error-messages="resource.errors.username"
                                        class="input-group"
                                        label="Email or username"
                                        name="username"
                                        type="text"
                                        hide-details
                                        value="{{ old('username') }}"
                                    ></v-text-field>
                                    <input type="hidden" name="_back" value="1">
                                    <v-text-field
                                        :append-icon-cb="() => (resource.visible = !resource.visible)"
                                        :append-icon="resource.visible ? 'visibility' : 'visibility_off'"
                                        :error-messages="resource.errors.password"
                                        :type="resource.visible ? 'text': 'password'"
                                        class="input-group"
                                        label="Password"
                                        min="6"
                                        name="password"
                                        hide-details
                                        value="{{ old('password') }}"
                                    ></v-text-field>

                                    <v-card-actions>
                                        {{-- <v-btn class="ma-0" role="button" secondary outline href="{{ route('register.show') }}">{{ __('Create Account') }}</v-btn> --}}
                                        <v-spacer></v-spacer>
                                        <v-btn class="ma-0 elevation-1" primary type="submit">{{ __("Login") }}</v-btn>
                                    </v-card-actions>
                                </form>
                            </v-card-text>
                        </v-card>
                        @endif

                        @if (user())
                        <v-card class="elevation-1 mb-3">
                            <v-toolbar dark class="transparent elevation-1 blue">
                                <v-toolbar-title>{{ __('Payment Method') }}</v-toolbar-title>
                            </v-toolbar>
                            <v-divider></v-divider>
                            <v-card-text class="text-xs-center py-4 grey--text">
                                {{ __('Choose your payment method below') }}
                            </v-card-text>
                            <v-card-text class="text-xs-center py-">
                                {{-- <pre>{{ dd(serialize($item->guests)) }}</pre> --}}
                                <img src="{{ assets('frontier/images/public/paypal.png') }}">
                                <div class=" mt-4">
                                    <form action="{{ route('shop.payment.paypal') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="items[0][amount]" value="{{ $resource->price }}"><br>
                                        <input type="hidden" name="items[0][quantity]" value="{{ $item->quantity }}"><br>
                                        <input type="hidden" name="items[0][name]" value="{{ $resource->name }}"><br>

                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <input type="hidden" name="name" value="{{ $item->name }}">
                                        <input type="hidden" name="price" value="{{ $item->price }}">
                                        <input type="hidden" name="customer_id" value="{{ user()->id }}">
                                        <input type="hidden" name="quantity" value="{{ $item->quantity }}">
                                        <input type="hidden" name="experience_id" value="{{ $resource->id }}">
                                        <input type="hidden" name="currency" value="{{ settings('site_currency.code', 'PHP') }}">
                                        <input type="hidden" name="metadata" value="{{ serialize($item->guests) }}">

                                        <v-btn type="submit" round info ref="uop"  class="elevation-1 px-4"><v-icon left>fa-paypal</v-icon>{{ __('Checkout') }}</v-btn>
                                    </form>
                                </div>
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-text class="text-xs-center py-4">
                                <img width="100" src="{{ assets('frontier/images/public/bpi.png') }}" alt="">
                                <v-card-text class="mt-4">
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text subheading">Account Number</div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="subheading">{{ settings('bpi_account_number', '9641-0003-69') }}</div>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex xs4>
                                            <div class="grey--text subheading">Account Name</div>
                                        </v-flex>
                                        <v-flex xs8>
                                            <div class="subheading">{{ settings('bpi_account_name', 'EXPH Travel Differently Inc.') }}</div>
                                        </v-flex>
                                    </v-layout>
                                </v-card-text>
                                {{-- <v-card-actions class="gery--text">
                                    <v-spacer></v-spacer>
                                    <v-btn primary>{{ __('I will pay through BPI') }}</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions> --}}
                            </v-card-text>
                        </v-card>
                        @endif

                        @if (user())
                        <v-card class="elevation-1 mb-3">
                            <v-toolbar class="elevation-0 transparent">
                            <v-toolbar-side-icon><v-icon warning>fa-bell</v-icon></v-toolbar-side-icon>
                                <v-toolbar-title>{{ __('Reminder') }}</v-toolbar-title>
                            </v-toolbar>
                            <v-divider></v-divider>
                            <v-card-text>
                                <div class="subheading grey--text text--darken-2">
                                    You have been booked. You have 42 hours to pay from the time of booking to pay for this reservation through PayPal/BPI. You will receive a confirmation email <strong>({{ user()->email }})</strong> once payment is made.
                                </div>
                            </v-card-text>
                        </v-card>
                        @endif

                        <v-card class="elevation-0 transparent" height="100px"></v-card>
                    </v-flex>

                    @if (user())
                    <v-flex md4 xs12 class="hidden-sm-and-down">
                        <v-card class="elevation-1 mb-3">
                            <v-card-media src="{{ assets('frontier/images/placeholder/red2.jpg') }}">
                                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                <v-card-text class="text-xs-center">
                                    <v-card dark class="elevation-0 transparent py-5">
                                        <div class="title pb-3 white--text"><strong>{{ $resource->name }}</strong></div>
                                        <div class="display-2 white--text">{{ settings('site_currency.symbol', '₱') }}<span class="fw-500"> {{ $total }}</span></div>
                                        <div class="body-2 white--text">{{ __('Total') }}</span></div>
                                    </v-card>
                                </v-card-text>
                            </v-card-media>
                            <v-list two-line>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon color="indigo">date_range</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>{{ $resource->date }}</v-list-tile-title>
                                        <v-list-tile-sub-title>{{ $resource->days }}</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon color="indigo">schedule</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>{{ "$resource->time" }}</v-list-tile-title>
                                        <v-list-tile-sub-title>{{ __($resource->day) }}</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-divider></v-divider>
                            </v-list>
                            <v-divider></v-divider>
                            <v-card-text>
                                <v-list class="elevation-1">
                                    <v-list-tile>

                                    </v-list-tile>
                                </v-list>
                            </v-card-text>
                            <v-card class="elevation-0 mb-3">
                                <v-toolbar class="transparent elevation-0">
                                    <v-toolbar-title class="subheading">Reference Number: {{ $resource->refnum }} </v-toolbar-title>
                                </v-toolbar>
                            </v-card>
                        </v-card>

                        <v-card class="elevation-1 mb-3">
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
                            <v-divider></v-divider>
                            <v-list two-line subheader>
                                <v-list-tile avatar>
                                    <v-list-tile-action>
                                        <v-icon warning>warning</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="fw-500">Full Refund</v-list-tile-title>
                                        <v-list-tile-sub-title>Before 2 weeks</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile avatar>
                                    <v-list-tile-action>
                                        <v-icon warning>warning</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="fw-500">Half Refund</v-list-tile-title>
                                        <v-list-tile-sub-title>5 to 10 business days</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile avatar>
                                    <v-list-tile-action>
                                        <v-icon warning>warning</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="fw-500">No Refund</v-list-tile-title>
                                        <v-list-tile-sub-title>Within or less than 5 days</v-list-tile-sub-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-flex>
                    @endif
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    @if (user())
    <v-card class="elevation-1 fixed-nav hidden-md-and-up" style="z-index: 3;">
        <v-layout row wrap>
            <v-flex xs12>
                <v-card-actions>
                    <v-card-text class="px-0 py-2">
                        <div class="subheading pl-4"><strong>₱ 6,000</strong> <span class="body-1">per person</span></div>
                        <v-dialog class="hidden-md-and-up" v-model="dialog.billing" fullscreen transition="dialog-bottom-transition" :overlay=false>
                            <v-btn flat small class="body-2 primary--text details-btn" slot="activator">See details</v-btn>
                            <v-card>
                                <v-toolbar light class="white elevation-0">
                                    <v-spacer></v-spacer>
                                    <v-btn icon @click.native="dialog.billing = false">
                                        <v-icon>close</v-icon>
                                    </v-btn>
                                </v-toolbar>
                                <v-card-media src="{{ assets('frontier/images/placeholder/red2.jpg') }}">
                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                    <v-card-text class="text-xs-center">
                                        <v-card dark class="elevation-0 transparent py-5">
                                            <div class="title pb-3 white--text"><strong>Random Road Trip #1</strong></div>
                                            <div class="display-2 white--text">₱<span class="fw-500"> 6,000</span></div>
                                            <div class="body-2 white--text">per person</span></div>
                                        </v-card>
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
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon color="indigo">face</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="grey--text text--darken-1">x 3</v-list-tile-title>
                                        </v-list-tile-content>
                                        <v-list-tile-action>
                                            <v-list-tile-title>₱ 6,000</v-list-tile-title>
                                        </v-list-tile-action>
                                    </v-list-tile>
                                    <v-divider></v-divider>
                                    <v-list-tile>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="grey--text text--darken-1">Total ( PHP )</v-list-tile-title>
                                        </v-list-tile-content>
                                        <v-list-tile-action>
                                            <v-list-tile-title class="title success--text">₱ <strong>18,000</strong></v-list-tile-title>
                                        </v-list-tile-action>
                                    </v-list-tile>
                                </v-list>
                                <v-divider></v-divider>
                                <v-card class="elevation-0">
                                    <v-toolbar class="transparent elevation-0">
                                        <v-toolbar-title class="subheading">Reference Number: 500500266 </v-toolbar-title>
                                    </v-toolbar>
                                </v-card>
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
                                        <v-list-tile-action>
                                            <v-icon warning>warning</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="fw-500">Full Refund</v-list-tile-title>
                                            <v-list-tile-sub-title>Before 2 weeks</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile avatar>
                                        <v-list-tile-action>
                                            <v-icon warning>warning</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="fw-500">Half Refund</v-list-tile-title>
                                            <v-list-tile-sub-title>5 to 10 business days</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile avatar>
                                        <v-list-tile-action>
                                            <v-icon warning>warning</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="fw-500">No Refund</v-list-tile-title>
                                            <v-list-tile-sub-title>Within or less than 5 days</v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                            </v-card>
                        </v-dialog>
                    </v-card-text>
                </v-card-actions>
            </v-flex>
        </v-layout>
    </v-card>
    @endif
@endsection

@push('css')
    <style>
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        .fixed-nav {
            position: fixed !important;
            bottom: 0;
            width: 100%;
            z-index: 1;
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
                        billing: false
                    },
                    removebar: true,
                    wew: true,
                    resource: {
                        errors: JSON.parse('{!! json_encode($errors->getMessages()) !!}'),
                        item: [],
                        model: false,
                        remember: true,
                        visible: false,
                    }
                }
            },
            mounted () {
               {{--  $('[type=submit]').on('click', function (e) {

                }); --}}
            }
        });
    </script>
@endpush
