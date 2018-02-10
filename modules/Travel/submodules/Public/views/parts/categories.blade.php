<section id="categories">
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg10 md12 sm12 xs12>
                <v-card-text class="text-xs-center my-3">
                    <h2 class="display-1 uppercase">{!! settings('category_title') !!}</h2>
                    <h2 class="subheading grey--text text--darken-1">{!! settings('category_subtitle') !!}</h2>
                </v-card-text>
                <v-layout row wrap align-center>
                    <v-spacer></v-spacer>
                    <v-flex xs12
                        v-bind="{ [`sm4`]: true }"
                        v-for="(card, i) in categories"
                        :key="i"
                        >
                        <a href="experiences" ripple class="td-n">
                            <v-card class="elevation-1 c-lift">
                                <v-card-media
                                    :src="card.feature"
                                    height="300px"
                                    >
                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                    <v-container fill-height fluid class="pa-0 white--text">
                                        <v-layout row wrap align-center justify-center>
                                        <v-card class="elevation-0 transparent text-xs-center">
                                            <h5 class="white--text text-xs-center"><strong>@{{ card.name }}</strong></h5>
                                        </v-card>
                                        </v-layout>
                                    </v-container>
                                </v-card-media>
                            </v-card>
                        </a>
                    </v-flex>
                    <v-spacer></v-spacer>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>
</section>

@push('pre-scripts')
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    categories: [],
                }
            },

            mounted () {
                let query = {
                        descending: true,
                        page: 1,
                        sort: 'rating',
                        take: 5,
                    };
                this.api().get('{{ route('api.experiences.all') }}', query)
                    .then((data) => {
                        this.categories = data.items.data;
                        // console.log("GET", data)
                    });
            }
        });
    </script>
@endpush
