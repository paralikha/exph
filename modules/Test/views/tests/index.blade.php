@extends("Theme::layouts.admin")

@section("head-title", __('Test Review'))

@section("content")
    @include("Theme::partials.banner")
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card class="elevation-1 mb-3">
                    <form action="{{ route('tests.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-card-text>
                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Message') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-messages="resource.errors.body"
                                        label="{{ _('Type a Message') }}"
                                        name="body"
                                        value="{{ old('body') }}"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn type="submit" primary class="elevation-1">{{ __('Save') }}</v-btn>
                        </v-card-actions>
                    </form>
                </v-card>

                <v-card class="elevation-1 mb-3">
                    <v-list two-line v-bind:pagination.sync="dataset.pagination" v-for="item in dataset.items" v-bind:key="item.id" @click="">
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <img src="{{ auth()->user()->avatar }}" alt="">
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    <a href="#!" class="td-n primary--text text--darken-4 body-2">{{ auth()->user()->fullname }}</a>
                                </v-list-tile-title>
                                <v-list-tile-sub-title>@{{ item.created }}</v-list-tile-sub-title>
                            </v-list-tile-content>

                            <v-list-tile-action>
                                <v-menu bottom left>
                                    <v-btn icon flat slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                                    <v-list>
                                        <v-list-tile ripple @click="">
                                            <v-list-tile-action>
                                                <v-icon accent>report</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('Report') }}
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile ripple @click="">
                                            <v-list-tile-action>
                                                <v-icon error>delete</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('Delete') }}
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                    </v-list>
                                </v-menu>
                            </v-list-tile-action>
                        </v-list-tile>
                        <div class="pl-7 pr-4 grey--text text--darken-2">@{{ item.body }}</div>
                    </v-list>
                </v-card>

                {{-- to remove --}}
                <v-card class="mb-3 elevation-1" style="display: none;">
                    <v-data-table
                        v-bind:pagination.sync="dataset.pagination"
                        >
                    </v-data-table>
                </v-card>
                {{-- to remove --}}
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
        .no-decoration {
            text-decoration: none !important;
        }
        .pl-7 {
            padding-left: 70px;
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
                    bulk: {
                        destroy: {
                            model: false,
                        },
                        searchform: {
                            model: false,
                        },
                    },
                    hidden: true,
                    dataset: {
                        headers: [
                            { text: '{{ __("ID") }}', align: 'left', value: 'id' },
                            { text: '{{ __("Name") }}', align: 'left', value: 'name' },
                            { text: '{{ __("Alias") }}', align: 'left', value: 'alias' },
                            { text: '{{ __("Code") }}', align: 'left', value: 'code' },
                            { text: '{{ __("Last Modified") }}', align: 'left', value: 'updated_at' },
                            { text: '{{ __("Actions") }}', align: 'center', sortable: false, value: 'updated_at' },
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
                    resource: {
                        item: {
                            name: '',
                            code: '',
                            description: '',
                            grants: '',
                        },
                        errors: JSON.parse('{!! json_encode($errors->getMessages()) !!}'),
                    },
                    suppliments: {
                        grants: {
                            headers: [
                                { text: '{{ __("Name") }}', align: 'left', value: 'name' },
                            ],
                            pagination: {
                                rowsPerPage: 10,
                                totalItems: 0,
                            },
                            items: [],
                            selected: [],
                            searchform: {
                                query: '',
                                model: true,
                            }
                        }
                    },
                    urls: {
                        test: {
                            api: {
                                destroy: '{{ route('api.tests.destroy', 'null') }}',
                            },
                            show: '{{ route('tests.show', 'null') }}',
                            edit: '{{ route('tests.edit', 'null') }}',
                            destroy: '{{ route('tests.destroy', 'null') }}',
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
                };
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

                        this.api().search('{{ route('api.tests.search') }}', query)
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
                    this.api().get('{{ route('api.tests.all') }}', query)
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
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },

                destroy (url, query) {
                    var self = this;
                    this.api().delete(url, query)
                        .then((data) => {
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },
            },

            mounted () {
                this.get();
                // console.log("dataset.pagination", this.dataset.pagination);
            },
        });
    </script>
@endpush
