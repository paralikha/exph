<section id="cta">
    <v-layout row wrap>
        <v-flex xs12>

            <v-card class="elevation-0">
                <v-card-media src="{!! settings('cta_bg') !!}" width="100%">
                    <div class="insert-overlay" style="background: rgba(0, 0, 0, .65); position: absolute; width: 100%; height: 100%;"></div>
                    <v-card-text class="pa-0 py-5">
                        <v-layout row wrap align-center justify-center>
                            <v-flex lg6 md8 sm10>
                                <v-card dark class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <h4 class="uppercase"><strong>{!! settings('cta_title') !!}</strong></h4>
                                        <div class="subheading">{!! settings('cta_subtitle') !!}</div>
                                    </v-card-text>
                                </v-card>
                                <v-layout row wrap>
                                    <v-flex md5 sm5 xs12>
                                        <v-card-text>
                                            <v-menu
                                                :close-on-content-click="true"
                                                v-model="menu"
                                                transition="scale-transition"
                                                right
                                                bottom
                                                full-width
                                                max-width="290px"
                                                min-width="290px"
                                                >
                                                <v-text-field
                                                    slot="activator"
                                                    append-icon="date_range"
                                                    light solo hide-details single-line
                                                    label="From"
                                                    v-model="from"
                                                    readonly
                                                ></v-text-field>
                                                <v-date-picker v-model="from" no-title scrollable actions>
                                                </v-date-picker>
                                            </v-menu>
                                        </v-card-text>
                                    </v-flex>
                                    <v-flex md5 sm5 xs12>
                                        <v-card-text>
                                            <v-menu
                                                :close-on-content-click="true"
                                                {{-- v-model="from" --}}
                                                transition="scale-transition"
                                                right
                                                bottom
                                                full-width
                                                max-width="290px"
                                                min-width="290px"
                                                >
                                                <v-text-field
                                                    slot="activator"
                                                    append-icon="date_range"
                                                    light solo hide-details single-line
                                                    label="To"
                                                    v-model="to"
                                                    readonly
                                                ></v-text-field>
                                                <v-date-picker v-model="to" no-title scrollable actions>
                                                </v-date-picker>
                                            </v-menu>
                                        </v-card-text>
                                    </v-flex>
                                    <v-flex md2 sm2 xs12>
                                        <v-card-text class="text-xs-center">
                                            <v-btn target="_blank" :href="`{{ route('experiences.all') }}?date_from=${from}&date_to=${to}`" large round dark primary class="elevation-1 white--text px-2">Experience Now</v-btn>
                                        </v-card-text>
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                        </v-layout>
                    </v-card-text>
                </v-card-media>
            </v-card>
        </v-flex>
    </v-layout>
</section>
@push('pre-scripts')
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    from: null,
                    to: null,
                    schedule: null,
                }
            },
        });
    </script>
@endpush
