@extends("Theme::layouts.admin")

@section("head-title", __("Profile"))

@section("content")
    <v-container fluid>
        <v-container fluid grid-list-lg>
            <v-layout row>
                <v-flex md3 sm4 xs12>
                    <v-card class="elevation-1">
                        <v-list class="py-0">
                            <v-list-tile ripple href="{{ route('profile.account', $resource->handlename) }}">
                                <v-list-tile-action>
                                    <v-icon>credit_card</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        {{ __('Transaction History') }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile ripple href="{{ route('profile.wishlists', $resource->handlename) }}">
                                <v-list-tile-action>
                                    <v-icon primary>favorite</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title class="primary--text">
                                        {{ __('Wishlist') }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
                <v-flex md9 sm8 xs12>
                    <v-toolbar dark class="blue elevation-1">
                        <v-toolbar-title>Wishlists</v-toolbar-title>
                        <v-spacer></v-spacer>
                        {{-- <v-btn icon v-tooltip:left="{ 'html': 'Search' }"><v-icon>search</v-btn> --}}
                        {{-- <v-btn icon v-tooltip:left="{ 'html': 'Filter' }"><v-icon>fa fa-filter</v-btn> --}}
                    </v-toolbar>
                    <v-container fluid grid-list-lg>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-layout row wrap>
                                    <v-flex xs12 sm6 md4 v-for="card in experiences">
                                        <a :href="route(urls.experiences.show, card.code)" ripple class="td-n">
                                            <v-card class="elevation-1 c-lift">
                                                <v-card-media
                                                    height="180px"
                                                    :src="card.src"
                                                    class="grey lighten-4">
                                                    <div class="text-xs-right" style="width: 100%;">
                                                        <v-btn large v-tooltip:left="{ html: 'Remove from wishlist' }" icon class="mr-3">
                                                            @include("Experience::components.wishlisted")
                                                        </v-btn>
                                                        <v-chip label class="ma-0 white--text green lighten-1" v-html="card.price" style="position: absolute; bottom: 15px; right: 0;"></v-chip>
                                                    </div>
                                                </v-card-media>
                                                <v-divider class="grey lighten-3"></v-divider>
                                                <v-toolbar card dense class="transparent pt-2">
                                                    <v-toolbar-title class="mr-3 subheading">
                                                        <span class="body-2">@{{ card.title }}</span><br>
                                                        <span class="caption">@{{ card.date }}</span><br>
                                                    </v-toolbar-title>
                                                </v-toolbar>
                                                <v-card-text class="grey--text pt-4">
                                                    <v-icon class="subheading grey--text text--lighten-1 pb-1">whatshot</v-icon>
                                                    <span class="caption">@{{ card.category }}</span>
                                                    <div>
                                                        <v-icon class="subheading primary--text pb-1">star</v-icon>
                                                        <v-icon class="subheading primary--text pb-1">star</v-icon>
                                                        <v-icon class="subheading primary--text pb-1">star</v-icon>
                                                        <v-icon class="subheading primary--text pb-1">star</v-icon>
                                                        <v-icon class="subheading primary--text pb-1">star_half</v-icon>
                                                        4.6
                                                    </div>
                                                </v-card-text>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-flex>
            </v-layout>
        </v-container>
    </v-container>


    <v-container fluid grid-list-lg>
        {{-- <v-layout row wrap>
            <v-flex sm6 md8 xs12>

                <v-card class="mb-3 elevation-1">


                    <form action="{{ route('settings.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-card-text>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn type="submit" primary>{{ __('Save') }}</v-btn>
                        </v-card-actions>
                    </form>

                </v-card>

            </v-flex>
        </v-layout> --}}
    </v-container>
    @include("Theme::partials.banner")
@endsection

@push('css')
    <style>
        .card--flex-toolbar {
            margin-top: -97px;
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
                    resource: {
                        items: {!! json_encode(@$resource) !!},
                    },
                    bulk: {
                        destroy: {
                            model: false,
                        },
                        searchform: {
                            model: false,
                        },
                    },
                    dataset: {
                        bulk: {
                            model: false,
                        },
                        headers: [
                            { text: '{{ __("ID") }}', align: 'left', value: 'id' },
                            { text: '{{ __("Experience") }}', align: 'left', value: 'id' },
                            { text: '{{ __("Date Booked") }}', align: 'left', value: 'purchased_at' },
                            { text: '{{ __("Payment ID") }}', align: 'left', value: 'payment_id' },
                            { text: '{{ __("Payer ID") }}', align: 'left', value: 'payer_id' },
                            { text: '{{ __("Quantity") }}', align: 'left', value: 'quantity' },
                            { text: '{{ __("Price") }}', align: 'left', value: 'price' },
                            { text: '{{ __("Total") }}', align: 'left', value: 'total' },
                        ],
                        items: [],
                        loading: true,
                        pagination: {
                            rowsPerPage: 5,
                            totalItems: 0,
                        },
                        searchform: {
                            model: false,
                            query: '',
                        },
                        selected: [],
                        totalItems: 0,
                    },
                    resource: {
                        item: {
                            name: '',
                            code: '',
                            description: '',
                        },
                        errors: JSON.parse('{!! json_encode($errors->getMessages()) !!}'),
                    },
                    urls: {
                        transactions: {
                            api: {
                                destroy: '{{ route('api.transactions.destroy', 'null') }}',
                            },
                            show: '{{ route('transactions.show', 'null') }}',
                            edit: '{{ route('transactions.edit', 'null') }}',
                            destroy: '{{ route('transactions.destroy', 'null') }}',
                        },
                        experiences: {
                            show: '{{ route('experiences.show', 'null') }}',
                        }
                    },

                    snackbar: {
                        model: false,
                        text: '',
                        context: '',
                        timeout: 2000,
                        y: 'bottom',
                        x: 'right'
                    },
                }
            },
            watch: {
                'dataset.pagination': {
                    handler () {
                        this.get();
                    },
                    deep: true
                },

                'dataset.searchform.query': function (filter) {
                    setTimeout(() => {
                        const { sortBy, descending, page, rowsPerPage } = this.dataset.pagination;

                        let query = {
                            descending: descending,
                            page: page,
                            q: filter,
                            sort: sortBy,
                            take: rowsPerPage,
                        };

                        this.api().search('{{ route('api.transactions.search') }}', query)
                            .then((data) => {
                                this.dataset.items = data.items.data ? data.items.data : data.items;
                                this.dataset.totalItems = data.items.total ? data.items.total : data.total;
                                this.dataset.loading = false;
                            });
                    }, 1000);
                },
            },

            methods: {
                get () {
                    const { sortBy, descending, page, rowsPerPage } = this.dataset.pagination;
                    let query = {
                        descending: descending,
                        page: page,
                        sort: sortBy,
                        take: rowsPerPage,
                    };

                    this.api().get('{{ route('api.transactions.all') }}', query)
                        .then((data) => {
                            this.dataset.items = data.items.data ? data.items.data : data.items;
                            this.dataset.totalItems = data.items.total ? data.items.total : data.total;
                            this.dataset.loading = false;
                        });
                },

                post (url, query) {
                    var self = this;
                    this.api().post(url, query)
                        .then((data) => {
                            self.get('{{ route('api.transactions.all') }}');
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },

                destroy (url, query) {
                    var self = this;
                    this.api().delete(url, query)
                        .then((data) => {
                            self.get('{{ route('api.transactions.all') }}');
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },
            },

            mounted () {
                this.get();
            },
        });
    </script>
@endpush
