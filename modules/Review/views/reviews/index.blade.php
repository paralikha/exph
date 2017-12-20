@extends("Theme::layouts.admin")

@section("head-title", __('Reviews'))

@section("content")
    @include("Theme::partials.banner")
    <v-toolbar dark class="light-blue elevation-1 sticky">
        <v-toolbar-title>{{ __('Reviews') }}</v-toolbar-title>
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
         <v-btn icon @click.native="hidden = !hidden" v-tooltip:left="{ 'html':  hidden ? 'Add' : 'Close' }">
            <v-icon>@{{ hidden ? 'add' : 'remove' }}</v-icon>
        </v-btn>

        <v-btn icon v-tooltip:left="{ html: 'Filter' }">
            <v-icon class="subheading">fa fa-filter</v-icon>
        </v-btn>

        <v-btn icon v-tooltip:left="{ html: 'Sort' }">
            <v-icon class="subheading">fa fa-sort-amount-asc</v-icon>
        </v-btn>

        {{-- Batch Commands --}}
        <v-btn
            v-show="dataset.selected.length < 2"
            flat
            icon
            v-model="bulk.destroy.model"
            :class="bulk.destroy.model ? 'btn--active primary primary--text' : ''"
            v-tooltip:left="{'html': '{{ __('Toggle the bulk command checboxes') }}'}"
            @click.native="bulk.destroy.model = !bulk.destroy.model"
        ><v-icon>@{{ bulk.destroy.model ? 'check_circle' : 'check_circle' }}</v-icon></v-btn>
        {{-- Bulk Delete --}}
        <v-slide-y-transition>
            <template v-if="dataset.selected.length > 1">
                <form action="{{ route('reviews.many.destroy') }}" method="POST" class="inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <template v-for="item in dataset.selected">
                        <input type="hidden" name="reviews[]" :value="item.id">
                    </template>
                    <v-btn
                        flat
                        icon
                        type="submit"
                        v-tooltip:left="{'html': `Move ${dataset.selected.length} selected items to Trash`}"
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
            href="{{ route('reviews.trash') }}"
            light
            v-tooltip:left="{'html': `View trashed items`}"
        ><v-icon class="white--text warning--after" v-badge:{{ $trashed }}.overlap>archive</v-icon></v-btn> --}}
        {{-- /Trashed --}}
    </v-toolbar>
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                {{-- start create field --}}
                <v-card class="elevation-1 mb-3">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __('New Reviews') }}</v-toolbar-title>
                    </v-toolbar>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-card-text>
                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Name') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-messages="resource.errors.name"
                                        label="{{ _('Name') }}"
                                        name="name"
                                        value="{{ old('name') }}"
                                        @input="(val) => { resource.item.name = val; }"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Alias') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-messages="resource.errors.alias"
                                        :value="resource.item.name ? resource.item.name : '{{ old('alias') }}' | slugify"
                                        label="{{ _('Alias') }}"
                                        name="alias"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Code') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-messages="resource.errors.code"
                                        :value="resource.item.name ? resource.item.name : '{{ old('code') }}' | slugify"
                                        hint="{{ __('Will be used as an ID for Reviews. Make sure the code is unique.') }}"
                                        label="{{ _('Code') }}"
                                        name="code"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Description') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-messages="resource.errors.description"
                                        label="{{ _('Short Description') }}"
                                        name="description"
                                        value="{{ old('description') }}"
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
                {{-- end create field --}}




                <v-card class="mb-3 elevation-1">
                    <v-data-table
                        :loading="dataset.loading"
                        :total-items="dataset.totalItems"
                        class="elevation-0"
                        no-data-text="{{ _('No resource found') }}"
                        v-bind="bulk.destroy.model?{'select-all':'primary'}:[]"
                        {{-- selected-key="id" --}}
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
                                    class="pa-0 primary--text"
                                    v-model="prop.selected"
                                ></v-checkbox>
                            </td>
                            <td>@{{ prop.item.id }}</td>
                            <td>
                               <strong>@{{ prop.item.name }}</strong>
                            </td>
                            <td>@{{ prop.item.alias }}</td>
                            <td>@{{ prop.item.code }}</td>
                            <td>@{{ prop.item.created }}</td>
                            <td class="text-xs-center">
                                <v-menu bottom left>
                                    <v-btn icon flat slot="activator"><v-icon>more_vert</v-icon></v-btn>
                                    <v-list>
                                        <v-list-tile :href="route(urls.reviews.edit, (prop.item.id))">
                                            <v-list-tile-action>
                                                <v-icon accent>edit</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('Edit') }}
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile
                                            @click="destroy(route(urls.reviews.api.destroy, prop.item.id),
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
@endsection

@push('css')
    <style>
        .no-decoration {
            text-decoration: none !important;
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
                        descending: descending,
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
