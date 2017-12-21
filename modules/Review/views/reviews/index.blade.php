@extends("Theme::layouts.admin")

@section("head-title", __('Reviews'))

@section("content")
    @include("Theme::partials.banner")

    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                {{-- start create field --}}
                <v-card class="elevation-1 mb-3">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __('Reviews') }}</v-toolbar-title>
                    </v-toolbar>

                    <form action="{{ route('reviews.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-card-text>
                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Post a review') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-messages="resource.errors.body"
                                        label="{{ _('Post a review') }}"
                                        name="body"
                                        multi-line
                                        value="{{ old('body') }}"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn type="submit" primary class="elevation-1">{{ __('Post') }}</v-btn>
                        </v-card-actions>
                    </form>
                </v-card>
                {{-- end create field --}}


                <v-card class="elevation-1 mb-3">


                    <v-list two-line v-bind:pagination.sync="dataset.pagination" v-for="item in dataset.items" v-bind:key="item.id" @click="">
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <img :src="item.avatar" />
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title><a href="#!" class="td-n fw-500 grey--text text--darken-3">Cole Sprouse</a></v-list-tile-title>
                                <v-list-tile-sub-title>December 12, 2017</v-list-tile-sub-title>
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

                <v-card class="mb-3 elevation-1" style="display: none;">
                    <v-data-table
                        v-bind:pagination.sync="dataset.pagination"
                        >
                    </v-data-table>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
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
                            items: [],
                            selected: [],
                            searchform: {
                                query: '',
                                model: true,
                            }
                        }
                    },
                    urls: {
                        reviews: {
                            api: {
                                destroy: '{{ route('api.reviews.destroy', 'null') }}',
                            },
                            show: '{{ route('reviews.show', 'null') }}',
                            edit: '{{ route('reviews.edit', 'null') }}',
                            destroy: '{{ route('reviews.destroy', 'null') }}',
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

                'dataset.searchform.query': function (filter) {
                    setTimeout(() => {
                        const { sortBy, descending, page, rowsPerPage } = this.dataset.pagination;

                        let query = {
                            descending: descending ? descending : null,
                            page: page,
                            q: filter,
                            sort: sortBy,
                            take: rowsPerPage,
                        };

                        this.api().search('{{ route('api.reviews.search') }}', query)
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
                        descending: descending ? descending : null,
                        page: page,
                        sort: sortBy,
                        take: rowsPerPage,
                    };
                    this.api().get('{{ route('api.reviews.all') }}', query)
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
