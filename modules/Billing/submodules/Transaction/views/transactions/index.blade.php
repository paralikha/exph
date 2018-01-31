{{--
Template Name: Transaction Template
Description: A page for all experiences.
Author: Princess Ellen Alto
Version: 1.0
--}}

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
        <v-layout row wrap justify-center align-top>
            <v-flex lg10 md12 xs12>
                <v-layout row wrap>
                    <v-flex md3 sm4 xs12>
                        <v-card class="elevation-1">
                            <v-list class="py-0">
                                <v-list-tile ripple href="\notifications">
                                    <v-list-tile-action>
                                        <v-icon>notifications</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{ __('Notifications') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile ripple href="\transactions">
                                    <v-list-tile-action>
                                        <v-icon primary>credit_card</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title class="primary--text">
                                            {{ __('Transaction History') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile ripple href="\wishlist">
                                    <v-list-tile-action>
                                        <v-icon>favorite</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{ __('Wishlist') }}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                        </v-card>
                    </v-flex>

                    <v-flex md9 sm8 xs12>
                        <v-toolbar dark class="blue elevation-1 sticky">
                            <v-toolbar-title >{{ __($application->page->title) }}</v-toolbar-title>
                            <v-spacer></v-spacer>

                            {{-- Search --}}
                            <template>
                                <v-text-field
                                    :append-icon-cb="() => {dataset.searchform.model = !dataset.searchform.model}"
                                    :prefix="dataset.searchform.prefix"
                                    :prepend-icon="dataset.searchform.prepend"
                                    append-icon="close"
                                    light solo hide-details single-line
                                    label="Search"
                                    v-model="dataset.searchform.query"
                                    v-show="dataset.searchform.model"
                                ></v-text-field>
                                <v-btn v-show="!dataset.searchform.model" icon v-tooltip:left="{'html': dataset.searchform.model ? 'Clear' : 'Search resources'}" @click.native="dataset.searchform.model = !dataset.searchform.model;dataset,searchform.query = '';"><v-icon>search</v-icon></v-btn>
                            </template>
                            {{-- /Search --}}

                            <v-btn icon v-tooltip:left="{ html: 'Filter' }">
                                <v-icon class="subheading">fa fa-filter</v-icon>
                            </v-btn>

                            <v-btn icon v-tooltip:left="{ html: 'Export to Excel' }">
                                <v-icon>file_download</v-icon>
                            </v-btn>

                            {{-- Batch Commands --}}
                            <v-btn
                                v-show="dataset.selected.length < 2"
                                flat
                                icon
                                v-model="bulk.destroy.model"
                                :class="bulk.destroy.model ? 'btn--active primary primary--text' : ''"
                                v-tooltip:left="{'html': '{{ __('Toggle the bulk command checkboxes') }}'}"
                                @click.native="bulk.destroy.model = !bulk.destroy.model"
                            ><v-icon>@{{ bulk.destroy.model ? 'check_circle' : 'check_circle' }}</v-icon></v-btn>

                            {{-- Bulk Delete --}}
                            <v-slide-y-transition>
                                <template v-if="dataset.selected.length > 1">
                                    <form action="{{ route('transactions.many.destroy') }}" method="POST" class="inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <template v-for="item in dataset.selected">
                                            <input type="hidden" name="transactions[]" :value="item.id">
                                        </template>
                                        <v-btn
                                            flat
                                            icon
                                            type="submit"
                                            v-tooltip:left="{'html': `Move ${ dataset.selected.length } selected items to Trash`}"
                                        ><v-icon warning>delete_sweep</v-icon></v-btn>
                                    </form>
                                </template>
                            </v-slide-y-transition>
                            {{-- /Bulk Delete --}}
                            {{-- /Batch Commands --}}

                            {{-- Trashed --}}
                            {{-- <v-btn
                                icon
                                flat
                                href="{{ route('transactions.trash') }}"
                                dark
                                v-tooltip:left="{'html': `View trashed items`}"
                            ><v-icon class="warning--after" v-badge:{{ $trashed }}.overlap>archive</v-icon></v-btn> --}}
                            {{-- /Trashed --}}
                        </v-toolbar>

                        <v-container fluid>
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-card class="elevation-1">

                                        <v-data-table
                                            :loading="dataset.loading"
                                            v-bind="bulk.destroy.model?{'select-all':'primary'}:[]"
                                            :total-items="dataset.totalItems"
                                            class="elevation-0"
                                            no-data-text="{{ _('No resource found') }}"
                                            selected-key="id"
                                            v-bind:headers="dataset.headers"
                                            v-bind:items="dataset.items"
                                            v-bind:pagination.sync="dataset.pagination"
                                            v-model="dataset.selected"
                                        >
                                            <template slot="headerCell" scope="props">
                                                <span v-tooltip:bottom="{'html': props.header.text}">
                                                    @{{ props.header.text }}
                                                </span>
                                            </template>
                                            <template slot="items" scope="prop">
                                                <td v-show="bulk.destroy.model">
                                                    <v-checkbox
                                                        hide-details
                                                        color="primary"
                                                        class="pa-0"
                                                        v-model="prop.selected"
                                                    ></v-checkbox>
                                                </td>
                                                <td>@{{ prop.item.id }}</td>
                                                <td width="40%">December 11, 2017</td>
                                                <td width="40%">
                                                    <a class="black--text ripple td-n" :href="route(urls.transactions.show, prop.item.id)">
                                                       <strong v-tooltip:bottom="{ html: 'Show Detail' }">@{{ prop.item.name }}</strong>
                                                    </a>
                                                </td>
                                                <td>Payout</td>
                                                <td>₱ 6,000</td>
                                                <td class="text-xs-center">
                                                    <v-menu bottom left>
                                                        <v-btn icon flat slot="activator" v-tooltip:bottom="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                                                        <v-list>
                                                            <v-list-tile ripple :href="route(urls.transactions.show, (prop.item.id))">
                                                                <v-list-tile-action>
                                                                    <v-icon info>search</v-icon>
                                                                </v-list-tile-action>
                                                                <v-list-tile-content>
                                                                    <v-list-tile-title>
                                                                        {{ __('View details') }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile-content>
                                                            </v-list-tile>
                                                            <v-list-tile ripple :href="route(urls.transactions.edit, (prop.item.id))">
                                                                <v-list-tile-action>
                                                                    <v-icon accent>edit</v-icon>
                                                                </v-list-tile-action>
                                                                <v-list-tile-content>
                                                                    <v-list-tile-title>
                                                                        {{ __('Edit') }}
                                                                    </v-list-tile-title>
                                                                </v-list-tile-content>
                                                            </v-list-tile>
                                                            <v-list-tile ripple
                                                                @click="destroy(route(urls.transactions.api.destroy, prop.item.id),
                                                                {
                                                                    '_token': '{{ csrf_token() }}'
                                                                })">
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
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    {{-- @include("Public::sections.footer") --}}
@endsection


@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    n1: null,
                    n2: null,
                    n3: null,
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
                            { text: '{{ __("Date Booked") }}', align: 'left', value: 'date' },
                            { text: '{{ __("Experience") }}', align: 'left', value: 'experience' },
                            { text: '{{ __("Type") }}', align: 'left', value: 'type' },
                            { text: '{{ __("Paid Out") }}', align: 'left', value: 'paid' },
                            { text: '{{ __("Actions") }}', align: 'center', sortable: false, value: 'updated_at' },
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
                this.mountSuppliments();
            },
        });
    </script>
@endpush

