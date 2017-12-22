{{-- Editor --}}
{{-- reply --}}
<v-card class="elevation-1">
    <v-toolbar class="transparent elevation-0">
        <v-toolbar-title>{{ __("1 Review") }}</v-toolbar-title>
    </v-toolbar>
    <v-divider></v-divider>
    <v-card-text class="pa-0 pb-3">
        <v-card-text class="pa-0">
            <v-card class="elevation-0">
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
                    <v-card-text class="text-xs-right pa-0">
                        <v-btn  type="submit" flat class="primary--text">Post a comment</v-btn>
                    </v-card-text>
                </form>
                <v-divider></v-divider>
            </v-card>
        </v-card-text>

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
    </v-card-text>
    <v-divider></v-divider>

    {{-- to remove --}}
    <v-card class="mb-3 elevation-1" style="display: none;">
        <v-data-table
            v-bind:pagination.sync="dataset.pagination"
            >
        </v-data-table>
    </v-card>
    {{-- to remove --}}

    {{-- paginate --}}
    <v-card-text class="text-xs-right">
        <v-pagination class="caption main-paginate" circle :length="15" v-model="page" :total-visible="7"></v-pagination>
    </v-card-text>
    {{-- paginate --}}
</v-card>

{{-- /Editor --}}

@push('css')
    {{-- <link rel="stylesheet" href="{{ assets('frontier/vuetify-mediabox/dist/vuetify-mediabox.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.css') }}">
    <style>
        .pl-7 {
            padding-left: 70px;
        }
        .comment-field .input-group__input {
            padding-top: 0 !important;
            border: 1px solid #9e9e9e !important;
        }
        .ql-container {
            min-height: 120px !important;
        }
        .quill-editor .ql-editor {
            min-height: auto !important;
        }
        .main-paginate .pagination__item,
        .main-paginate .pagination__navigation {
            box-shadow: none !important;
        }
        .application--light .pagination__item--active {
            background: #03a9f4 !important;
        }
    </style>
@endpush

@push('pre-scripts')
    {{-- <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script> --}}
    {{-- <script src="{{ assets('frontier/vuetify-mediabox/dist/vuetify-mediabox.min.js') }}"></script> --}}
    <script src="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.js') }}"></script>
    <script>
        // Vue.use(VueResource);
        mixins.push({
            data () {
                return {
                    resource: {
                        quill: {
                            html: '{!! old('body') !!}',
                            delta: JSON.parse({!! json_encode(old('delta')) !!}),
                        }
                    },
                    mediabox: {
                        model: false,
                        fonts: {!! json_encode(config('editor.fonts.enabled', [])) !!},
                        url: '',
                        resource: {
                            thumbnail: '',
                        },
                    },
                    //
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
                }
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
        })
    </script>
@endpush
