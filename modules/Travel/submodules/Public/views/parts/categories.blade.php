<section id="categories">
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg10 md12 sm12 xs12>
                <v-card-text class="text-xs-center my-3">
                    <h2 class="display-1">{{ __("POPULAR ROAD TRIPS") }}</h2>
                    <h2 class="subheading grey-

                    -text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
                </v-card-text>
                <v-layout row wrap align-center>
                    <v-flex xs12
                        v-bind="{ [`sm${card.flex}`]: true }"
                        v-for="card in categories"
                        :key="card.title"
                        >
                        <a href="experiences" ripple class="td-n">
                            <v-card class="elevation-1 c-lift">
                                <v-card-media
                                    :src="card.src"
                                    height="300px"
                                    >
                                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                    <v-container fill-height fluid class="pa-0 white--text">
                                        <v-layout row wrap align-center justify-center>
                                        <v-card class="elevation-0 transparent text-xs-center">
                                            <h5 class="white--text text-xs-center"><strong>@{{ card.title }}</strong></h5>
                                        </v-card>
                                        </v-layout>
                                    </v-container>
                                </v-card-media>
                            </v-card>
                        </a>
                    </v-flex>
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
                    categories: [
                        { title: '2017 SCHEDULE', src: '{{ assets('frontier/images/placeholder/9.png') }}', flex: 8, height: '100%' },
                        { title: 'SPECIAL', src: '{{ assets('frontier/images/placeholder/14.jpg') }}', flex: 4 },
                        { title: 'SINGLES', src: '{{ assets('frontier/images/placeholder/city.png') }}', flex: 3},
                        { title: 'EAT AND EXPLORE', src: '{{ assets('frontier/images/placeholder/8.jpg') }}', flex: 6},
                        { title: 'RANDOM', src: '{{ assets('frontier/images/placeholder/red2.jpg') }}', flex: 3},
                    ],
                }
            },
        });
    </script>
@endpush
