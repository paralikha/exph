@extends("Frontier::layouts.admin")

@section("content")
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card class="mb-3 elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __($application->page->title) }}</v-toolbar-title>
                        <v-spacer></v-spacer>

                        {{-- Batch Commands --}}
                        <v-btn
                            v-show="dataset.selected.length < 2"
                            flat
                            icon
                            v-model="bulk.commands.model"
                            :class="bulk.commands.model ? 'btn--active error error--text' : ''"
                            v-tooltip:left="{'html': '{{ __('Toggle the bulk command checkboxes') }}'}"
                            @click.native="bulk.commands.model = !bulk.commands.model"
                        ><v-icon>@{{ bulk.commands.model ? 'indeterminate_check_box' : 'check_box_outline_blank' }}</v-icon></v-btn>

                        {{-- Bulk Restore --}}
                        <v-slide-y-transition>
                            <template v-if="dataset.selected.length > 1">
                                <form :action="route(urls.roadtrips.restore, false)" method="POST" class="inline">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <template v-for="item in dataset.selected">
                                        <input type="hidden" name="id[]" :value="item.id">
                                    </template>
                                    <v-btn flat icon type="submit" v-tooltip:left="{'html': `Restore ${dataset.selected.length} selected items`}"><v-icon success>restore</v-icon></v-btn>
                                </form>
                            </template>
                        </v-slide-y-transition>
                        {{-- Bulk Restore --}}

                        {{-- Bulk Delete --}}
                        <v-slide-y-transition>
                            <template v-if="dataset.selected.length > 1">
                                {{-- Delete --}}
                                <form :action="route(urls.roadtrips.delete, false)" method="POST" class="inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <template v-for="item in dataset.selected">
                                        <input type="hidden" name="id[]" :value="item.id">
                                    </template>
                                    <v-btn flat icon type="submit" v-tooltip:left="{'html': `Move ${dataset.selected.length} selected items to Trash`}"><v-icon error>delete_sweep</v-icon></v-btn>
                                </form>
                            </template>
                        </v-slide-y-transition>
                        {{-- Bulk Delete --}}

                        {{-- Batch Commands --}}

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
                        {{-- Search --}}

                    </v-toolbar>

                    <v-data-table
                        :loading="dataset.loading"
                        :total-items="dataset.pagination.totalItems"
                        class="elevation-0 grey--text"
                        no-data-text="{{ __('No resource found') }}"
                        v-bind="bulk.commands.model?{'select-all':'primary'}:{}"
                        v-bind:headers="dataset.headers"
                        v-bind:items="dataset.items"
                        v-bind:pagination.sync="dataset.pagination"
                        v-model="dataset.selected">
                        <template slot="items" scope="prop">
                            <td class="grey--text text--darken-1" v-show="bulk.commands.model"><v-checkbox hide-details class="primary--text" v-model="prop.selected"></v-checkbox></td>
                            <td class="grey--text text--darken-1" v-html="prop.item.id"></td>
                            <td class="grey--text text--darken-1"><strong v-html="prop.item.name"></strong></td>
                            <td class="grey--text text--darken-1" v-html="prop.item.code"></td>
                            <td class="grey--text text--darken-1" v-html="prop.item.reference_number"></td>
                            <td class="grey--text text--darken-1" v-html="prop.item.created"></td>
                            <td class="grey--text text--darken-1" v-html="prop.item.removed"></td>
                            <td class="grey--text text--darken-1 text-xs-center">
                                <v-menu bottom left>
                                    <v-btn icon flat slot="activator"><v-icon>more_vert</v-icon></v-btn>
                                    <v-list>
                                        <v-list-tile ripple @click="$refs.restore.submit()">
                                            <v-list-tile-action>
                                                <v-icon class="success--text">restore</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    <form ref="restore" :action="route(urls.roadtrips.restore, prop.item.id)" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        {{ __('Restore') }}
                                                    </form>
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                        <v-list-tile ripple @click="setDialog(true, prop.item)">
                                            <v-list-tile-action>
                                                <v-icon warning>delete</v-icon>
                                            </v-list-tile-action>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    {{ __('Permanently Delete...') }}
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

    <v-dialog v-model="dataset.dialog.model" persistent lazy width="auto">
        <v-card class="text-xs-center">
            <v-card-title class="headline">{{ __('Permanently Delete') }} "@{{ dataset.dialog.data.name }}"</v-card-title>
            <v-card-text >
                {{ __("You are about to permanently delete the resource. This action is irreversible. Do you want to proceed?") }}
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn flat @click.native="dataset.dialog.model=false">{{ __('Cancel') }}</v-btn>
                <form :action="route(urls.roadtrips.delete, (dataset.dialog.data.id))" method="POST" class="inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <v-btn type="submit" flat class="error error--text">{{ __('Permanently Delete') }}</v-btn>
                </form>
            </v-card-actions>
        </v-card>
    </v-dialog>
@endsection

@push('pre-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    bulk: {
                        commands: {
                            model: false,
                        },
                    },
                    urls: {
                        roadtrips: {
                            restore: '{{ route('roadtrips.restore', 'null') }}',
                            delete: '{{ route('roadtrips.delete', 'null') }}',
                        }
                    },
                    dataset: {
                        dialog: {
                            model: false,
                            data: {},
                        },
                        headers: [
                            { text: '{{ __("ID") }}', align: 'left', value: 'id' },
                            { text: '{{ __("Name") }}', align: 'left', value: 'name' },
                            { text: '{{ __("Code") }}', align: 'left', value: 'code' },
                            { text: '{{ __("Reference Number") }}', align: 'left', value: 'reference_number' },
                            { text: '{{ __("Created") }}', align: 'left', value: 'created_at' },
                            { text: '{{ __("Removed") }}', align: 'left', value: 'deleted_at' },
                            { text: '{{ __("Actions") }}', align: 'center', sortable: false },
                        ],
                        items: [],
                        loading: true,
                        pagination: {
                            rowsPerPage: {{ settings('rows_per_page', 10) }},
                            totalItems: 0,
                        },
                        searchform: {
                            model: false,
                            query: '',
                        },
                        selected: [],
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
                            search: filter,
                            sort: sortBy,
                            take: rowsPerPage,
                            only_trashed: true,
                        };

                        this.api().search('{{ route('api.roadtrips.all') }}', query)
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
                        only_trashed: true,
                    };
                    this.api().get('{{ route('api.roadtrips.all') }}', query)
                        .then((data) => {
                            this.dataset.items = data.items.data ? data.items.data : data.items;
                            this.dataset.pagination.totalItems = data.items.total ? data.items.total : data.total;
                            this.dataset.loading = false;
                        });
                },

                setDialog (model, data) {
                    this.dataset.dialog.model = model;
                    this.dataset.dialog.data = data;
                },
            },

            mounted () {
                this.get();
            }
        });
    </script>

@endpush
