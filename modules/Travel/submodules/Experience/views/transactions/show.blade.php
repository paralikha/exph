@extends("Theme::layouts.auth")
@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Public::sections.nav")
        </v-toolbar>
    </v-card>
    <v-toolbar dark extended class="blue elevation-0">
        <v-btn
            href="{{ route('transactions.index') }}"
            ripple
            flat
            >
            <v-icon left dark>arrow_back</v-icon>
            Back
        </v-btn>
    </v-toolbar>
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card flat class="transparent">
                    <v-layout row wrap justify-center align-top>
                        <v-flex lg8 md10>
                            <v-layout row wrap>
                                <v-flex md8 xs12>
                                    <v-card class="card--flex-toolbar elevation-1 mb-3">
                                        <v-toolbar class="elevation-1">
                                            <v-toolbar-title>{{ $resource->name }}</v-toolbar-title>
                                        </v-toolbar>
                                        <v-divider></v-divider>
                                        <v-card-text>
                                            <div class="subheading">Itinerary etc</div>
                                        </v-card-text>
                                    </v-card>
                                    <v-card class="elevation-1 mb-3">
                                        <v-toolbar class="elevation-0 transparent">
                                            <v-toolbar-title>Reminders</v-toolbar-title>
                                        </v-toolbar>
                                        <v-divider></v-divider>
                                        <v-card-text>
                                            <div class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum qui, voluptate temporibus, aperiam atque reprehenderit adipisci quam facilis omnis suscipit, porro autem incidunt maiores optio odit, impedit pariatur praesentium sunt.</div>
                                        </v-card-text>
                                    </v-card>
                                    <v-card class="elevation-1 mb-3">
                                        <v-toolbar class="elevation-0 transparent">
                                            <v-toolbar-title>Guest Details</v-toolbar-title>
                                        </v-toolbar>
                                        <v-divider></v-divider>
                                        <v-card-text>
                                            <v-list>
                                                <v-list-tile avatar>
                                                    <v-list-tile-avatar>
                                                        <img src="{{ assets('frontier/images/placeholder/woman.jpg') }}"/>
                                                    </v-list-tile-avatar>
                                                    <v-list-tile-content>
                                                        <v-list-tile-title>Angelina Jolie</v-list-tile-title>
                                                    </v-list-tile-content>
                                                    <v-list-tile-action>
                                                        <v-list-tile-sub-title>primary</v-list-tile-sub-title>
                                                    </v-list-tile-action>
                                                </v-list-tile>
                                                <v-list-tile avatar>
                                                    <v-list-tile-avatar>
                                                        <img src="{{ assets('frontier/images/placeholder/man.jpg') }}"/>
                                                    </v-list-tile-avatar>
                                                    <v-list-tile-content>
                                                        <v-list-tile-title>Cole Sprouse</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile avatar>
                                                    <v-list-tile-avatar>
                                                        <img src="{{ assets('frontier/images/public/mark.jpg') }}"/>
                                                    </v-list-tile-avatar>
                                                    <v-list-tile-content>
                                                        <v-list-tile-title>Mark Zuckerberg</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card-text>
                                    </v-card>
                                    <v-card class="elevation-1 flex--btm">
                                        <v-toolbar class="elevation-0 transparent">
                                            <v-toolbar-title>Payment Details</v-toolbar-title>
                                        </v-toolbar>
                                        <v-divider></v-divider>
                                        <v-card-text>
                                            <v-layout row wrap>
                                                <v-flex xs4>
                                                    <div class="grey--text subheading">Date</div>
                                                </v-flex>
                                                <v-flex xs8>
                                                    <div class="subheading">December 14, 2017</div>
                                                </v-flex>
                                            </v-layout>
                                            <v-layout row wrap>
                                                <v-flex xs4>
                                                    <div class="grey--text subheading">Transaction ID</div>
                                                </v-flex>
                                                <v-flex xs8>
                                                    <div class="subheading">1234567890</div>
                                                </v-flex>
                                            </v-layout>
                                            <v-layout row wrap>
                                                <v-flex xs4>
                                                    <div class="grey--text subheading">Type</div>
                                                </v-flex>
                                                <v-flex xs8>
                                                    <div class="subheading">BPI Bank (24h Hold)</div>
                                                </v-flex>
                                            </v-layout>
                                            <v-layout row wrap>
                                                <v-flex xs4>
                                                    <div class="grey--text subheading">Amount</div>
                                                </v-flex>
                                                <v-flex xs8>
                                                    <div class="subheading">PHP 18,000</div>
                                                </v-flex>
                                            </v-layout>
                                            <v-layout row wrap>
                                                <v-flex xs4>
                                                    <div class="grey--text subheading">Status</div>
                                                </v-flex>
                                                <v-flex xs8>
                                                    <div class="subheading">Pending</div>
                                                </v-flex>
                                            </v-layout>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                {{-- Right --}}
                                <v-flex md4 xs12>
                                    <v-card class="card--flex-toolbar elevation-1 mb-3">
                                        <v-toolbar class="elevation-0 transparent">
                                            <v-toolbar-title>Booking Details</v-toolbar-title>
                                        </v-toolbar>
                                        <v-divider></v-divider>
                                        <v-card-text>
                                            <div class="body-2">Reference Number</div>
                                            <p class="title primary--text"><strong>500500266</strong></p>
                                            <div class="body-2">Status</div>
                                            <p class="subheading">ON HOLD</p>
                                            <div class="body-2">Booking Date</div>
                                            <p class="subheading"> January 18, 2018</p>
                                        </v-card-text>
                                    </v-card>

                                    <v-card class="elevation-1 mb-3">
                                        <v-toolbar class="elevation-0 transparent">
                                            <v-toolbar-title>Fare Breakdown</v-toolbar-title>
                                        </v-toolbar>
                                        <v-divider></v-divider>
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
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
        .card--flex-toolbar {
            margin-top: -80px;
        }
        .flex--btm {
            margin-bottom: 80px;
        }
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
                    resource: {
                        item: {!! json_encode($resource) !!},
                        model: false,
                        dialog: {
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
