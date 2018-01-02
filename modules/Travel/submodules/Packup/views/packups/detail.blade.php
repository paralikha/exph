@extends("Theme::layouts.auth")
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
                        <v-card class="elevation-1">
                            <v-toolbar flat class="transparent">
                                <v-toolbar-title class="accent--text">{{ __('Add Guest Requirements') }}</v-toolbar-title>
                            </v-toolbar>

                            <v-toolbar class="elevation-1 transparent">
                                <v-toolbar-title class="white--text">
                                    <v-spacer></v-spacer>
                                    <v-btn icon><v-icon>bookmark</v-icon></v-btn>
                                </v-toolbar-title>
                            </v-toolbar>

                            <v-card-text>
                                <v-toolbar class="elevation-0 transparent">
                                    <v-toolbar-title>{{ __('Who’s coming?') }}</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <span v-if="guests.length" class="caption grey--text" v-html="`${guests.length} {{ __('additional people are coming') }}`"></span>
                                </v-toolbar>

                                @if (! user())
                                    <v-card-text>
                                        <span class="grey--text subheading">{{ __('Please Login to proceed') }}</span>
                                        <form action="{{ route('login.login') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_back" value="1">
                                            <v-text-field
                                                :error-messages="resource.errors.username"
                                                class="input-group"
                                                label="Email or username"
                                                name="username"
                                                type="text"
                                                hide-details
                                                value="{{ old('username') }}"
                                            ></v-text-field>
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
                                                <v-spacer></v-spacer>
                                                <v-btn class="ma-0 elevation-1" primary type="submit">{{ __("Login") }}</v-btn>
                                            </v-card-actions>
                                        </form>
                                    </v-card-text>
                                @else
                                <v-card-text class="grey--text text--darken-2 subheading">
                                    <v-list>
                                        <v-list-tile avatar>
                                            <v-list-tile-avatar>
                                                <img src="{{ user()->avatar }}">
                                            </v-list-tile-avatar>
                                            <v-list-tile-content>
                                                <v-list-tile-title v-html="'{{ user()->displayname }}'"></v-list-tile-title>
                                            </v-list-tile-content>
                                            <v-list-tile-action>
                                                <v-list-tile-sub-title>primary</v-list-tile-sub-title>
                                            </v-list-tile-action>
                                        </v-list-tile>

                                        <v-list-tile avatar v-for="(guest, i) in guests" :key="i">
                                            <v-list-tile-avatar>
                                                <v-btn icon disabled class="red"><span v-html="guest.icon ? guest.icon : guestInitial(guest.name)"></span></v-btn>
                                            </v-list-tile-avatar>
                                            <v-list-tile-content>
                                                <v-list-tile-title v-html="guest.name"></v-list-tile-title>
                                            </v-list-tile-content>
                                            <v-list-tile-action>
                                                <v-btn @click="removeGuest(i)" icon class="error--text"><v-icon>close</v-icon></v-btn>
                                            </v-list-tile-action>
                                        </v-list-tile>

                                        <v-list-tile avatar v-if="guestform.model">
                                            <v-list-tile-avatar>
                                                <span v-html="guestform.icon"></span>
                                            </v-list-tile-avatar>
                                            <v-list-tile-content>
                                                <v-text-field ref="guestformname" @input="guestInitial" v-model="guestform.name" label="{{ __('Name') }}"></v-text-field>
                                            </v-list-tile-content>
                                            <v-list-tile-action>
                                                <v-btn @click="addGuest" icon class="success--text"><v-icon>check</v-icon></v-btn>
                                            </v-list-tile-action>
                                        </v-list-tile>

                                        <v-list-tile ripple @click="showGuestForm">
                                            <v-list-tile-action>
                                                <v-btn outline small fab v-tooltip:right="{html: 'Add guest'}"><v-icon>add</v-icon></v-btn>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>{{ __('Add Guest') }}</v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                    </v-list>
                                </v-card-text>
                                @endif
                            </v-card-text>

                            <v-divider class="hidden-sm-and-down"></v-divider>
                            <v-card-text class="text-xs-right hidden-sm-and-down">
                                @if (user())
                                <form action="{{ route('packups.add', $resource->code) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" :name="`guests[${i}][name]`" :key="i" v-for="(guest, i) in guests" :value="guest.name">
                                    <input type="hidden" :name="`items[guests][${i}][name]`" :key="i" v-for="(guest, i) in guests" :value="guest.name">
                                    <input type="hidden" name="items[name]" value="{{ $resource->name }}">
                                    <input type="hidden" name="items[id]" value="{{ $resource->id }}">
                                    <input type="hidden" name="items[price]" value="{{ $resource->price }}">
                                    <input type="hidden" name="items[quantity]" :value="(guests.length + 1)">
                                    <input type="hidden" name="items[currency]" value="{{ $resource->currency }}">
                                    <input type="hidden" name="code" value="{{ $resource->code }}">
                                    <input type="hidden" name="currency" value="{{ $resource->currency }}">
                                    <input type="hidden" name="customer_id" value="{{ user()->id }}">
                                    <input type="hidden" name="packup_id" value="{{ $resource->id }}">

                                    <v-btn type="submit" ref="submitbutton" primary large class="elevation-1">{{ __('Proceed to Payment') }}</v-btn>
                                </form>
                                @endif
                            </v-card-text>
                        </v-card>
                        <v-card class="elevation-0 transparent" height="100px"></v-card>
                    </v-flex>

                    <v-flex md4 xs12 class="hidden-sm-and-down">
                        <v-card class="elevation-1 mb-3">
                            <v-card-media src="{{ $resource->feature }}">
                                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                <v-card-text class="text-xs-center">
                                    <v-card dark class="elevation-0 transparent py-5">
                                        <div class="title pb-3 white--text"><strong>{{ $resource->name }}</strong></div>
                                        <div class="display-2 white--text"><span class="fw-500">{{ $resource->amount }}</span></div>
                                        <div class="body-2 white--text">{{ __('per person') }}</span></div>
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
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon color="indigo">face</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="grey--text text--darken-1">x <span v-html="guests.length + 1"></span></v-list-tile-title>
                                        <span class="caption grey--text" v-html="`${guests.length} guests + you`"></span>
                                    </v-list-tile-content>
                                    <v-list-tile-action>
                                        <v-list-tile-title><span v-html="'{{ $resource->price }}'"></span></v-list-tile-title>
                                    </v-list-tile-action>
                                </v-list-tile>
                                <v-divider></v-divider>
                                <v-list-tile>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="grey--text text--darken-1"><strong>Total</strong></v-list-tile-title>
                                    </v-list-tile-content>
                                    <v-list-tile-action>
                                        <v-list-tile-title class="title"><strong>{{ settings('site_currency.code', 'PHP') }} <span v-html="(guests.length + 1) * {{ $resource->price }}"></span></strong></v-list-tile-title>
                                    </v-list-tile-action>
                                </v-list-tile>
                            </v-list>
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
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    <v-card class="elevation-1 fixed-nav hidden-md-and-up" style="z-index: 3;">
        <v-layout row wrap>
            <v-flex xs12>
                <v-card-actions>
                    <v-card-text class="py-2 px-0">
                        <div class="subheading pl-4">{{ settings('site_currency.code', 'PHP') }} <strong v-html="(guests.length + 1)*{{ $resource->price }}"></strong></div>
                        <v-dialog class="hidden-md-and-up" v-model="dialog.billing" fullscreen transition="dialog-bottom-transition" :overlay=false>
                            <v-btn flat small class="body-2 primary--text details-btn" slot="activator">See details</v-btn>
                            <v-card>
                                <v-toolbar light class="white elevation-0">
                                    <v-spacer></v-spacer>
                                    <v-btn icon @click.native="dialog.billing = false">
                                        <v-icon>close</v-icon>
                                    </v-btn>
                                </v-toolbar>
                                <v-card-media src="{{ $resource->feature }}">
                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                    <v-card-text class="text-xs-center">
                                        <v-card dark class="elevation-0 transparent py-5">
                                            <div class="title pb-3 white--text"><strong>{{ $resource->name }}</strong></div>
                                            <div class="display-2 white--text">{{ settings('site_currency.symbol', '₱') }}<span class="fw-500"> {{ $resource->price }}</span></div>
                                            <div class="body-2 white--text">{{ __('per person') }}</span></div>
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
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon color="indigo">face</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="grey--text text--darken-1">x <span v-html="guests.length + 1"></span></v-list-tile-title>
                                            <span class="caption grey--text" v-html="`${guests.length} guests + you`"></span>
                                        </v-list-tile-content>
                                        <v-list-tile-action>
                                            <v-list-tile-title>{{ $resource->price }}</v-list-tile-title>
                                        </v-list-tile-action>
                                    </v-list-tile>
                                    <v-divider></v-divider>
                                    <v-list-tile>
                                        <v-list-tile-content>
                                            <v-list-tile-title class="grey--text text--darken-1"><strong>Total</strong></v-list-tile-title>
                                        </v-list-tile-content>
                                        <v-list-tile-action>
                                        <v-list-tile-title class="title"><strong>{{ settings('site_currency.code', 'PHP') }} <span v-html="(guests.length + 1) * {{ $resource->price }}"></span></strong></v-list-tile-title>
                                    </v-list-tile-action>
                                    </v-list-tile>
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
                    <v-spacer></v-spacer>
                    <v-card-text class="py-2 text-xs-right">
                        @if (user())
                        <form action="{{ route('packups.add', $resource->code) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" :name="`guests[${i}][name]`" :key="i" v-for="(guest, i) in guests" :value="guest.name">
                            <input type="hidden" :name="`items[guests][${i}][name]`" :key="i" v-for="(guest, i) in guests" :value="guest.name">
                            <input type="hidden" name="items[name]" value="{{ $resource->name }}">
                            <input type="hidden" name="code" value="{{ $resource->code }}">
                            <input type="hidden" name="items[id]" value="{{ $resource->id }}">
                            <input type="hidden" name="items[price]" value="{{ $resource->price }}">
                            <input type="hidden" name="items[quantity]" :value="(guests.length + 1)">
                            <input type="hidden" name="items[currency]" value="{{ $resource->currency }}">
                            <input type="hidden" name="currency" value="{{ $resource->currency }}">
                            <input type="hidden" name="customer_id" value="{{ user()->id }}">
                            <input type="hidden" name="packup_id" value="{{ $resource->id }}">

                            <v-btn type="submit" ref="submitbutton" primary large class="elevation-1">{{ __('Proceed') }}</v-btn>
                        </form>
                        @endif
                    </v-card-text>
                </v-card-actions>
            </v-flex>
        </v-layout>
    </v-card>
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
                    product: {
                        total: 0
                    },
                    guestform: {
                        name: '',
                        email: '',
                        model: false,
                    },
                    guests: JSON.parse('{!! isset($guests) ? json_encode($guests) : json_encode([]) !!}') ? JSON.parse('{!! isset($guests) ? json_encode($guests) : json_encode([]) !!}') : [],
                    resource: {
                        errors: JSON.parse('{!! json_encode($errors->getMessages()) !!}'),
                        item: [],
                        model: false,
                        remember: true,
                        visible: false,
                    },
                }
            },
            methods: {
                addGuest () {
                    {{-- console.log(this.guests) --}}
                    if (this.guestform.name !== '') {
                        this.guests.push({
                            name: this.guestform.name,
                            email: this.guestform.email,
                            icon: this.guestform.icon,
                        });

                        this.showGuestForm();
                    }
                },
                showGuestForm () {
                    this.guestform.name = '';
                    this.guestform.email = '';
                    this.guestform.icon = '';
                    this.guestform.model = !this.guestform.model;
                    this.$refs.guestformname && this.$refs.guestformname.focus();
                },
                guestInitial (c) {
                    let words = c.split(' ');
                    let initial = [];
                    for (var i = 0; i < words.length; i++) {
                        if (i <= 1) {
                            initial.push(words[i].charAt(0));
                        }
                    }
                    return initial.join('').toUpperCase();
                },
                removeGuest(i) {
                    this.guests.splice(i, 1);
                }
            }
        });
    </script>
@endpush
