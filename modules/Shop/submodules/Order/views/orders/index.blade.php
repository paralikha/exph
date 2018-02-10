@extends("Theme::layouts.admin")

@section("content")
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-top justify-center>
            <v-flex xs12>

                @include("Theme::partials.banner")

                <v-card class="elevation-1">
                    <v-toolbar flat class="transparent">
                        <v-toolbar-title primary-title class="subheading accent--text">{{ __($application->page->title) }}</v-toolbar-title>
                        <v-spacer></v-spacer>

                        @include("Travel::toolbar.batch")

                        <form action="{{ route('orders.export') }}" method="POST">
                            {{ csrf_field() }}
                            <v-btn type="submit" primary class="white--text elevation-1">{{ __('Export') }}</v-btn>
                        </form>

                    </v-toolbar>

                    <v-data-table
                        :loading="dataset.loading"
                        :total-items="dataset.totalItems"
                        class="elevation-0"
                        no-data-text="{{ _('No resource found') }}"
                        v-bind="dataset.bulk.destroy.model?{'select-all':'primary'}:[]"
                        v-bind:headers="dataset.headers"
                        v-bind:items="dataset.items"
                        v-bind:pagination.sync="dataset.pagination"
                        v-model="dataset.selected"
                    >
                        <template slot="items" scope="prop">
                            <td v-show="dataset.bulk.destroy.model"><v-checkbox hide-details class="pa-0 primary--text" v-model="prop.selected"></v-checkbox></td>
                            <td v-html="prop.item.id"></td>
                            <td v-html="prop.item.customer.fullname"></td>
                            <td v-html="prop.item.experience.name"></td>
                            <td v-html="prop.item.total"></td>
                            <td v-html="prop.item.price"></td>
                            <td v-html="prop.item.quantity"></td>
                            <td v-html="prop.item.payment_id"></td>
                            <td v-html="prop.item.payer_id"></td>
                            <td class="text-xs-center">
                                <v-menu bottom left>
                                    <v-btn icon flat slot="activator"><v-icon>more_vert</v-icon></v-btn>
                                    <v-list>
                                        <v-list-tile ripple :href="route(dataset.urls.show, (prop.item.code))">
                                            <v-list-tile-action>
                                                <v-icon info>search</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('View details') }}
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile ripple :href="route(dataset.urls.edit, (prop.item.id))">
                                            <v-list-tile-action>
                                                <v-icon accent>edit</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('Edit') }}
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile ripple @click="destroy(route(dataset.urls.api.destroy, prop.item.id), {'_token': '{{ csrf_token() }}'})">
                                            <v-list-tile-action>
                                                <v-icon warning>delete</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('Move to Trash') }}
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                    </v-list>
                                </v-menu>
                            </td>
                        </template>
                    </v-data-table>
                </v-card>

            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('pre-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js"></script>
    <script>
        Vue.use(VueResource);
        mixins.push({
            data () {
                return {
                    dataset: {
                        test: 1,
                        urls: {
                            edit: '{{ route('orders.edit', 'null') }}',
                            show: '{{ route('orders.show', 'null') }}',
                            destroy: '{{ route('orders.destroy', 'null') }}',
                            api: {
                                destroy: '{{ route('api.orders.destroy', 'null') }}',
                            },
                        },
                        bulk: {
                            destroy: { model: false }
                        },
                        headers: [
                            { text: '{{ __("ID") }}', align: 'left', value: 'id' },
                            { text: '{{ __("Customer") }}', align: 'left', value: 'customer_id' },
                            { text: '{{ __("Experience") }}', align: 'left', value: 'experience_id' },
                            { text: '{{ __("Total") }}', align: 'left', value: 'total' },
                            { text: '{{ __("Price") }}', align: 'left', value: 'price' },
                            { text: '{{ __("Quantity") }}', align: 'left', value: 'quantity' },
                            { text: '{{ __("Payment ID") }}', align: 'left', value: 'payment_id' },
                            { text: '{{ __("Payer ID") }}', align: 'left', value: 'payer_id' },
                            { text: '{{ __("Actions") }}', align: 'center', sortable: false },
                        ],
                        items: [],
                        loading: true,
                        pagination: {
                            rowsPerPage: 10,
                            totalItems: 0,
                        },
                        searchform: {
                            model: false,
                            query: '',
                        },
                        selected: [],
                        totalItems: 0,
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

                        this.api().search('{{ route('api.orders.search') }}', query)
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
                    this.api().get('{{ route('api.orders.all') }}', query)
                        .then((data) => {
                            this.dataset.items = data.items.data ? data.items.data : data.items;
                            this.dataset.totalItems = data.items.total ? data.items.total : data.total;
                            this.dataset.loading = false;
                        });
                },

                destroy (url, query) {
                    var self = this;
                    this.api().delete(url, query)
                        .then((data) => {
                            self.get('{{ route('api.orders.all') }}');
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },
            },
            mounted () {
                this.get();
            }
        });
    </script>
@endpush

