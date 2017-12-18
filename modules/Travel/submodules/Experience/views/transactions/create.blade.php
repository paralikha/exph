@extends("Theme::layouts.admin")

@section("head-title", __('Create Transaction'))
@section("page-title", __('Create Transaction'))


@section("content")
    @include("Theme::partials.banner")
    <v-container fluid>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card class="elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __('Create Transaction') }}</v-toolbar-title>
                    </v-toolbar>
                    <v-card-text>
                        <form action="{{ route('transactions.store') }}" method="POST">
                            {{ csrf_field() }}

                            <v-layout row wrap>
                                <v-flex xs4>
                                    <v-subheader>{{ __('Title') }}</v-subheader>
                                </v-flex>
                                <v-flex xs8>
                                    <v-text-field
                                        :error-message="resource.errors.name"
                                        label="{{ _('Title') }}"
                                        name="name"
                                        value="{{ old('name') }}"
                                        @input="(val) => { resource.item.name = val; }"
                                    >
                                    </v-text-field>
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
                                        hint="{{ __('Will be used as a slug for Transaction. Make sure the code is unique.') }}"
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
                                        label="{{ _('Short description') }}"
                                        name="description"
                                        value="{{ old('description') }}"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <div class="text-sm-right">
                                <button type="submit" class="btn btn--raised primary ma-0"><span class="btn__content">{{ __('Submit') }}</span></button>
                            </div>
                        </form>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('css')
    <style>
        .inline {
            display: inline-block;
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
                    dataset: {
                        items: [],
                        loading: true,
                        selected: [],
                        totalItems: 0,
                    },
                    menu: false,
                    modal: false,
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
                            show: '{{ route('transactions.show', 'null') }}',
                            edit: '{{ route('transactions.edit', 'null') }}',
                            destroy: '{{ route('transactions.destroy', 'null') }}',
                        },
                    },
                };
            },

            mounted () {
                this.get();
                this.mountSuppliments();
                // console.log("dataset.pagination", this.dataset.pagination);
            },
        });
    </script>
@endpush
