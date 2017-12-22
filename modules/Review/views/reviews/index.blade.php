@extends("Theme::layouts.admin")

@section("head-title", __('Review'))

@section("content")
    @include("Theme::partials.banner")
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card class="elevation-1 mb-3">
                    <form action="{{ route('reviews.store') }}" method="POST">
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
                    <v-list two-line v-for="item in dataset.items" v-bind:key="item.id">
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <img src="{{ auth()->user()->avatar }}" alt="">
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    <a href="#!" class="td-n primary--text text--darken-4 body-2">{{ auth()->user()->fullname }}</a>
                                </v-list-tile-title>
                                <v-list-tile-sub-title class="body-1">@{{ item.created }}</v-list-tile-sub-title>
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
                                        <v-list-tile ripple
                                            @click="destroy(route(urls.reviews.api.destroy, item.id),
                                            {
                                                '_token': '{{ csrf_token() }}'
                                            })">
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
                    hidden: true,
                    dataset: {
                        items: [],
                        loading: true,
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
                };
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
                    this.api().get('{{ route('api.reviews.all') }}', query)
                        .then((data) => {
                            this.dataset.items = data.items.data ? data.items.data : data.items;
                            // this.dataset.totalItems = data.items.total ? data.items.total : data.total;
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
                            self.get('{{ route('api.reviews.all') }}');
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
