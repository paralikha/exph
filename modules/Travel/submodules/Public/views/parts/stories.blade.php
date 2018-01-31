<section id="stories">
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg10 md12 sm12 xs12>
                <v-card-text class="text-xs-center my-3">
                    <h2 class="display-1">{{ __("STORIES FROM THE ROAD") }}</h2>
                    <h2 class="subheading grey--text text--darken-1">A compilation of inspiring stories, adventures and news from the Experience Philippines community.</h2>
                </v-card-text>
                <v-layout row wrap>
                    <v-flex sm6 xs12>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-layout row wrap v-if="stories[0]">
                                    <v-flex xs12>
                                        <a :href="route(urls.stories.show, stories[0].code)" class="td-n">
                                            <v-card class="elevation-1 c-lift">
                                                <v-card-media
                                                    :src="stories[0].feature"
                                                    height="200px"
                                                    >
                                                    <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                                    <v-card-text class="white--text body-2" style="position: absolute; bottom: 0; left: 0;">
                                                        <div class="body-2" v-html="stories[0].title"></div>
                                                        <div class="caption" v-html="stories[0].created"></div>
                                                        <div class="caption">by <span v-html="stories[0].author"></span></div>
                                                    </v-card-text>
                                                </v-card-media>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                </v-layout>
                                <v-layout row wrap>
                                    <v-flex sm6 xs12 v-if="stories[1]">
                                        <a :href="route(urls.stories.show, stories[1].code)" class="td-n">
                                            <v-card class="elevation-1 c-lift">
                                                <v-card-media
                                                    :src="stories[1].feature"
                                                    height="200px"
                                                    >
                                                    <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                                    <v-card-text class="white--text body-2" style="position: absolute; bottom: 0; left: 0;">
                                                        <div class="body-2" v-html="stories[0].title"></div>
                                                        <div class="caption" v-html="stories[0].created"></div>
                                                        <div class="caption">by <span v-html="stories[0].author"></span></div>
                                                    </v-card-text>
                                                </v-card-media>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                    <v-flex sm6 xs12 v-if="stories[2]">
                                        <a :href="route(urls.stories.show, stories[2].code)" class="td-n">
                                            <v-card class="elevation-1 c-lift">
                                                <v-card-media
                                                    :src="stories[2].feature"
                                                    height="200px"
                                                    >
                                                    <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                                    <v-card-text class="white--text body-2" style="position: absolute; bottom: 0; left: 0;">
                                                        <div class="body-2" v-html="stories[2].title"></div>
                                                        <div class="caption" v-html="stories[2].created"></div>
                                                        <div class="caption">by <span v-html="stories[2].author"></span></div>
                                                    </v-card-text>
                                                </v-card-media>
                                            </v-card>
                                        </a>
                                    </v-flex>
                                </v-layout>
                            </v-flex>
                        </v-layout>
                    </v-flex>
                    <v-flex sm6 xs12 v-if="stories[3]">
                        <a :href="route(urls.stories.show, stories[3].code)" class="td-n">
                            <v-card class="elevation-1 c-lift" height="100%">
                                <v-card-media
                                    :src="stories[3].feature"
                                    height="100%"
                                    style="min-height: 200px;"
                                    >
                                    <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                    <v-card-text class="white--text body-2" style="position: absolute; bottom: 0; left: 0;">
                                        <div class="body-2" v-html="stories[3].title"></div>
                                        <div class="caption" v-html="stories[3].created"></div>
                                        <div class="caption">by <span v-html="stories[3].author"></span></div>
                                    </v-card-text>
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
        mixins.push({
            data () {
                return {
                    stories: [],
                    urls: {
                        stories: {
                            show: '{{ route('stories.show', 'null') }}',
                        },
                    },
                };
            },
            mounted () {
                let query = {
                        descending: true,
                        // page: 1,
                        sort: 'id',
                        take: 4,
                    };
                this.api().get('{{ route('api.stories.all') }}', query)
                    .then((data) => {
                        this.stories = data.items.data;
                        // console.log("STOR", data.items);
                    });
            },
        })
    </script>
@endpush
