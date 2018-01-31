<section id="review">
<v-card class="elevation-0 transparent hidden-sm-and-down">
    <v-parallax class="mb-4 mt-5 " height="450" src="{!! settings('review_bg') !!}">
        <v-layout
            column
            align-center
            justify-center
            class="white--text"
            >
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%; top: 0;"></div>
        </v-layout>
    </v-parallax>
    <v-card dark class="elevation-0 transparent card--flex">
        <v-container fluid grid-list-lg>
            <v-layout row wrap align-center justify-center>
                <v-flex lg10 sm12 xs12>
                    <v-layout row wrap align-top justify-top>
                        <v-flex md3 xs12>
                            <h4><strong>{!! settings('review_title') !!}</strong></h4>
                            <h2 class="subheading">{!! settings('review_subtitle') !!}</h2>
                        </v-flex>
                        <v-flex md9 xs12>
                            <v-layout row wrap>
                                <v-flex md4 xs12 v-for="item in reviews" :key="item.id">
                                    <v-card class="elevation-1">
                                        <v-card-media
                                            height="120px"
                                            :src="item.src"
                                            class="grey lighten-4">
                                        </v-card-media>
                                        <v-toolbar class="elevation-0 transparent"></v-toolbar>
                                        <v-card class="elevation-0 transparent text-xs-center review--flex">
                                            <v-avatar size="80px" class="">
                                                <img :src="item.avatar" alt="" style="border: 3px solid #fff;">
                                            </v-avatar>
                                        </v-card>

                                        <v-card-text class="text-xs-center">
                                            <div class="body-2">@{{ item.fullname }}</div>
                                            <div class="caption primary--text">@{{ item.trip }}</div>
                                            <div class="mt-2"><v-icon class="caption mr-2 mb-2">fa fa-quote-left</v-icon> @{{ item.text }} <v-icon class="caption ml-2 mb-2">fa fa-quote-right</v-icon></div>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </v-card>
</v-card>

{{-- Small viewport --}}
<v-card class="elevation-0 transparent hidden-md-and-up">
    <v-container fluid grid-list-lg>
    <v-card-text class="text-xs-center my-3">
        <h2 class="display-1">{!! settings('review_title') !!}</h2>
        <h2 class="subheading grey--text text--darken-1">{!! settings('review_subtitle') !!}</h2>
    </v-card-text>

    <v-layout row wrap>
        <v-flex sm4 xs12 v-for="item in reviews">
            <v-card class="elevation-1">
                <v-card-media
                    height="150px"
                    :src="item.src"
                    class="grey lighten-4">
                </v-card-media>
                <v-toolbar class="elevation-0 transparent"></v-toolbar>
                <v-card class="elevation-0 transparent text-xs-center review--flex">
                    <v-avatar size="80px" class="">
                        <img :src="item.avatar" alt="" style="border: 3px solid #fff;">
                    </v-avatar>
                </v-card>

                <v-card-text class="text-xs-center">
                    <div class="body-2">@{{ item.fullname }}</div>
                    <div class="caption primary--text">@{{ item.trip }}</div>
                    <div class="mt-2"><v-icon class="caption mr-2 mb-2">fa fa-quote-left</v-icon> @{{ item.text }} <v-icon class="caption ml-2 mb-2">fa fa-quote-right</v-icon></div>
                </v-card-text>
            </v-card>
        </v-flex>
    </v-layout>
    </v-container>
</v-card>
</section>

@push('css')
    <style>
        .card--flex {
            margin-top: -300px;
        }
        .review--flex {
            margin-top: -100px;
        }
    </style>
@endpush


@push('pre-scripts')
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    reviews: [
                        {
                            src: '{{ assets('frontier/images/placeholder/city.png') }}',
                            avatar: '{{ assets('frontier/images/placeholder/man.jpg') }}',
                            fullname: 'Cole Sprouse',
                            trip: 'Random Road Trip #1',
                            text: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonanti'
                        },
                        {
                            src: '{{ assets('frontier/images/placeholder/8.jpg') }}',
                            avatar: '{{ assets('frontier/images/placeholder/woman.jpg') }}',
                            fullname: 'Jane Appleseed',
                            trip: ' Luna Sea: Random Party',
                            text: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonanti'
                        },
                        {
                            src: '{{ assets('frontier/images/placeholder/city.jpg') }}',
                            fullname: ' Mark',
                            trip: 'Random Road Trip #22',
                            avatar: '{{ assets('frontier/images/public/mark.jpg') }}',
                            text: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonanti'
                        }
                    ]
                }
            },
        });
    </script>
@endpush
