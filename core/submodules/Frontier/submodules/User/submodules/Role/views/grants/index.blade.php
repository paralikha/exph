@extends("Theme::layouts.admin")

@section("head-title", __('Grants'))

@section("content")
    <v-container fluid grid-list-lg>
        @include("Theme::partials.banner")
        <v-layout row wrap>
            <v-flex sm4 xs12>
                <v-card class="mb-3 elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __("New Grant") }}</v-toolbar-title>
                    </v-toolbar>
                    <form action="{{ route('grants.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-card-text>
                            <v-text-field
                                :error-messages="resource.errors.name"
                                label="{{ _('Name') }}"
                                name="name"
                                persistent-hint
                                value="{{ old('name') }}"
                                @input="val => { resource.item.name = val; }"
                            ></v-text-field>
                            <v-text-field
                                :error-messages="resource.errors.code"
                                :value="resource.item.name ? resource.item.name : '{{ old('code') }}' | slugify"
                                hint="{{ __('Will be used as an ID for Granting Roles. Make sure the code is unique.') }}"
                                label="{{ _('Code') }}"
                                name="code"
                            ></v-text-field>
                            <v-text-field
                                :error-messages="resource.errors.description"
                                label="{{ _('Short Description') }}"
                                name="description"
                                value="{{ old('description') }}"
                            ></v-text-field>
                        </v-card-text>

                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-toolbar class="transparent elevation-0">
                                    <v-toolbar-title class="subheading">{{ __('Selected Permissions') }}</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                </v-toolbar>
                                <v-card-text class="text-xs-center">
                                    <template v-if="suppliments.permissions.selected.length">
                                        <template v-for="(permission, i) in suppliments.permissions.selected">
                                            <v-chip
                                                width="100px"
                                                label
                                                close
                                                success
                                                @click.native.stop
                                                @input="suppliments.permissions.selected.splice(i, 1)"
                                                class="chip--select-multi pink darken-3 white--text"
                                                :key="i"
                                            >
                                                <input type="hidden" name="json_permissions[]" :value="JSON.stringify(permission)">
                                                <input type="hidden" name="permissions[]" :value="permission.id">
                                                @{{ permission.name }}
                                            </v-chip>
                                        </template>
                                    </template>
                                    <small v-else class="grey--text">{{ __('No chosen Permissions') }}</small>
                                </v-card-text>
                            </v-flex>
                            <v-flex xs12>
                                <v-toolbar class="transparent elevation-0">
                                    <v-toolbar-title class="subheading">{{ __('Available Permissions') }}</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <v-text-field
                                        append-icon="search"
                                        label="{{ _('Search') }}"
                                        single-line
                                        hide-details
                                        v-model="suppliments.permissions.searchform.query"
                                        light
                                    ></v-text-field>
                                </v-toolbar>

                                <v-data-table
                                    class="elevation-0"
                                    no-data-text="{{ _('No resource found') }}"
                                    select-all
                                    selected-key="id"
                                    {{-- hide-actions --}}
                                    v-bind:search="suppliments.permissions.searchform.query"
                                    v-bind:headers="suppliments.permissions.headers"
                                    v-bind:items="suppliments.permissions.items"
                                    v-model="suppliments.permissions.selected"
                                    v-bind:pagination.sync="suppliments.permissions.pagination"
                                >
                                    <template slot="items" scope="prop">
                                        <tr role="button" :active="prop.selected" @click="prop.selected = !prop.selected">
                                            <td>
                                                <v-checkbox
                                                    primary
                                                    hide-details
                                                    class="pa-0"
                                                    :input-value="prop.selected"
                                                ></v-checkbox>
                                            </td>
                                            <td>@{{ prop.item.name }}</td>
                                            <td>@{{ prop.item.code }}</td>
                                            <td>@{{ prop.item.description }}</td>
                                        </tr>
                                    </template>
                                </v-data-table>
                            </v-flex>
                        </v-layout>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn primary type="submit">{{ __('Save') }}</v-btn>
                        </v-card-actions>
                    </form>
                </v-card>
            </v-flex>
            <v-flex sm8 xs12>
                <v-card class="mb-3 elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text"><v-icon class="accent--text">build</v-icon><span v-tooltip:bottom="{'html': 'Automatic Grant-Permission Provisioning'}">{{ __("Automatic Grant-Permission Provisioning") }}</span></v-toolbar-title>
                    </v-toolbar>
                    <form action="{{ route('grants.refresh.refresh') }}" method="POST">
                        {{ csrf_field() }}
                        <v-card-text>
                            <p class="grey--text mb-0">{{ __("Performing this action will automate most of the process of creating and grouping a collection of permissions into Grants. It will base its provisioning on the permissions configuration on each Modules installed.") }}</p>

                            <small class="warning--text">{{ __("Any edit you've made from existing grants might get overridden.") }}</small>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn primary type="submit" v-tooltip:bottom="{'html': 'Doing this action is relatively safe'}">
                                {{ __('Start') }}
                            </v-btn>
                        </v-card-actions>
                    </form>
                </v-card>

                <v-card class="mb-3 elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __('Grants') }}</v-toolbar-title>
                        <v-spacer></v-spacer>

                        {{-- Batch Commands --}}
                        <v-slide-y-transition>
                            <template v-if="dataset.selected.length > 1">
                                {{-- Bulk Delete --}}
                                <form action="{{ route('grants.many.destroy') }}" method="POST" class="inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <template v-for="item in dataset.selected">
                                        <input type="hidden" name="grants[]" :value="item.id">
                                    </template>
                                    <button type="submit" v-tooltip:left="{'html': `Move ${dataset.selected.length} selected items to Trash`}" class="btn btn--flat btn--icon"><span class="btn__content"><v-icon warning>delete_sweep</v-icon></span></button>
                                </form>
                                {{-- /Bulk Delete --}}
                            </template>
                        </v-slide-y-transition>
                        {{-- /Batch Commands --}}

                        {{-- Search --}}
                        <v-text-field
                            append-icon="search"
                            label="{{ _('Search') }}"
                            single-line
                            hide-details
                            v-if="dataset.searchform.model"
                            v-model="dataset.searchform.query"
                            light
                        ></v-text-field>
                        <v-btn v-tooltip:left="{'html': dataset.searchform.model ? 'Clear' : 'Search resources'}" icon flat light @click.native="dataset.searchform.model = !dataset.searchform.model; dataset.searchform.query = '';">
                            <v-icon>@{{ !dataset.searchform.model ? 'search' : 'clear' }}</v-icon>
                        </v-btn>
                        {{-- /Search --}}

                        {{-- View Trashed --}}
                        <a
                            class="btn btn--icon btn--flat theme--light light--bg"
                            light
                            href="{{ route('grants.trash') }}"
                            v-tooltip:left="{'html': `View trashed items`}"
                        >
                            <span class="btn__content"><v-icon>archive</v-icon></span>
                        </a>
                        {{-- /View Trashed --}}
                    </v-toolbar>

                    <v-data-table
                        :loading="dataset.loading"
                        :total-items="dataset.totalItems"
                        class="elevation-0"
                        no-data-text="{{ _('No resource found') }}"
                        select-all
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
                            <tr>
                                <td>
                                    <v-checkbox
                                        primary
                                        hide-details
                                        class="pa-0"
                                        v-model="prop.selected"
                                    ></v-checkbox>
                                </td>
                                <td>@{{ prop.item.id }}</td>
                                <td><strong v-tooltip:bottom="{'html': '{{ __('Edit the resource') }}'}"><a :href="route(urls.grants.edit, (prop.item.id))">@{{ prop.item.name }}</a></strong></td>
                                <td>@{{ prop.item.code }}</td>
                                <td>@{{ prop.item.excerpt }}</td>
                                <td class="text-xs-right">
                                    <span v-tooltip:bottom="{'html': 'Number of permissions associated'}">@{{ prop.item.permissions.length }}</span>
                                </td>
                                <td>@{{ prop.item.created }}</td>
                                <td class="text-xs-center">
                                    <v-menu bottom left>
                                        <v-btn icon flat slot="activator"><v-icon>more_vert</v-icon></v-btn>
                                        <v-list>
                                            <v-list-tile :href="route(urls.grants.show, (prop.item.id))">
                                                <v-list-tile-action>
                                                    <v-icon info>search</v-icon>
                                                </v-list-tile-action>
                                                <v-list-tile-content>
                                                    <v-list-tile-title>
                                                        {{ __('View details') }}
                                                    </v-list-tile-title>
                                                </v-list-tile-content>
                                            </v-list-tile>
                                            <v-list-tile :href="route(urls.grants.edit, (prop.item.id))">
                                                <v-list-tile-action>
                                                    <v-icon accent>edit</v-icon>
                                                </v-list-tile-action>
                                                <v-list-tile-content>
                                                    <v-list-tile-title>
                                                        {{ __('Edit this resource') }}
                                                    </v-list-tile-title>
                                                </v-list-tile-content>
                                            </v-list-tile>
                                            <v-list-tile
                                                @click.native.stop="destroy(route(urls.grants.api.destroy, prop.item.id),
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
                                            <v-list-tile @click.native.stop="post(route(urls.grants.api.clone, (prop.item.id)))">
                                                <v-list-tile-action>
                                                    <v-icon accent>content_copy</v-icon>
                                                </v-list-tile-action>
                                                <v-list-tile-content>
                                                    <v-list-tile-title>
                                                        {{ __('Clone the resource') }}
                                                    </v-list-tile-title>
                                                </v-list-tile-content>
                                            </v-list-tile>
                                        </v-list>
                                    </v-menu>
                                </td>
                            </tr>
                        </template>
                    </v-data-table>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    dataset: {
                        headers: [
                            { text: '{{ __("ID") }}', align: 'left', value: 'id' },
                            { text: '{{ __("Name") }}', align: 'left', value: 'name' },
                            { text: '{{ __("Code") }}', align: 'left', value: 'code' },
                            { text: '{{ __("Excerpt") }}', align: 'left', value: 'description' },
                            { text: '{{ __("Permissions") }}', align: 'left', value: 'grants' },
                            { text: '{{ __("Last Modified") }}', align: 'left', value: 'updated_at' },
                            { text: '{{ __("Actions") }}', align: 'center', sortable: false, value: 'updated_at' },
                        ],
                        items: [],
                        loading: true,
                        pagination: {
                            rowsPerPage: 5,
                            take: 5,
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
                        permissions: {
                            headers: [
                                { text: '{{ __("Name") }}', align: 'left', value: 'name' },
                                { text: '{{ __("Code") }}', align: 'left', value: 'code' },
                                { text: '{{ __("Description") }}', align: 'left', value: 'description' },
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
                        grants: {
                            api: {
                                clone: '{{ route('api.grants.clone', 'null') }}',
                                destroy: '{{ route('api.grants.destroy', 'null') }}',
                            },
                            show: '{{ route('grants.show', 'null') }}',
                            edit: '{{ route('grants.edit', 'null') }}',
                            destroy: '{{ route('grants.destroy', 'null') }}',
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
                        this.get('{{ route('api.grants.all') }}');
                    },
                    deep: true
                },

                'dataset.searchform.query': function (filter) {
                    setTimeout(() => {
                        const { sortBy, descending, page, rowsPerPage, totalItems } = this.dataset.pagination;

                        let query = {
                            descending: descending,
                            page: page,
                            q: filter,
                            sort: sortBy,
                            take: rowsPerPage,
                        };

                        this.api().search('{{ route('api.grants.search') }}', query)
                            .then((data) => {
                                this.dataset.items = data.items.data ? data.items.data : data.items;
                                this.dataset.totalItems = data.items.total ? data.items.total : data.total;
                                this.dataset.loading = false;
                            });
                    }, 1000);
                },
            },
            methods: {
                get (url) {
                    const { sortBy, descending, page, rowsPerPage } = this.dataset.pagination;
                    let query = {
                        descending: descending,
                        page: page,
                        sort: sortBy,
                        take: rowsPerPage,
                    };
                    this.api().get(url, query)
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
                            self.get('{{ route('api.grants.all') }}');
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },

                destroy (url, query) {
                    var self = this;
                    this.api().delete(url, query)
                        .then((data) => {
                            self.get('{{ route('api.grants.all') }}');
                            self.snackbar = Object.assign(self.snackbar, data.response.body);
                            self.snackbar.model = true;
                        });
                },

                mountSuppliments () {
                    let items = {!! json_encode($permissions) !!};
                    let g = [];
                    for (var i in items) {
                        g.push({
                            id: items[i].id,
                            name: items[i].name,
                            code: items[i].code,
                            description: items[i].description,
                        });
                    }
                    this.suppliments.permissions.items = g;

                    let selected = {!! json_encode(old('json_permissions')) !!};
                    console.log(selected);
                    let s = [];
                    if (selected) {
                        for (var i in selected) {
                            let instance = JSON.parse(selected[i]);
                            s.push({
                                id: instance.id,
                                name: instance.name,
                            });
                        }
                    }
                    this.suppliments.permissions.selected = s ? s : [];
                },
            },

            mounted () {
                this.get('{{ route('api.grants.all') }}');
                this.mountSuppliments();
                // this.dataset.pagination.rowsPerPage = this.dataset.totalItems <= 15 ? '-1' : this.dataset.totalItems;
            }
        });
    </script>
@endpush
