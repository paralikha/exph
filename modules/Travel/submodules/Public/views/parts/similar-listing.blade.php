<v-card class="elevation-0 transparent py-3">
    <v-card-text class="text-xs-center my-3">
        <h2 class="display-1">{{ __("Similar Listings") }}</h2>
        <h2 class="subheading grey--text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
    </v-card-text>
    <v-layout row wrap align-center>
        <v-flex xs12 sm4 md3 v-for="card in experiences">
            <a href="\experiences/show" ripple class="td-n">
                <v-card class="elevation-1 c-lift">
                    <v-card-media
                        height="180px"
                        :src="card.src"
                        class="grey lighten-4">
                        <div class="text-xs-right" style="width: 100%;">
                            <v-btn v-tooltip:left="{ html: 'Add to wishlist' }" large icon class="mr-3">
                                @include("Experience::components.wishlist")
                            </v-btn>
                            <v-chip label class="ma-0 white--text green lighten-1" v-html="card.price" style="position: absolute; bottom: 15px; right: 0;"></v-chip>
                        </div>
                    </v-card-media>
                    <v-divider class="grey lighten-3"></v-divider>
                    <v-toolbar card dense class="transparent pt-2">
                        <v-toolbar-title class="mr-3 subheading">
                            <span class="body-2">@{{ card.title }}</span><br>
                            <span class="caption">@{{ card.date }}</span><br>
                        </v-toolbar-title>
                    </v-toolbar>
                    <v-card-text class="grey--text pt-4">
                        <v-icon class="subheading grey--text text--lighten-1 pb-1">whatshot</v-icon>
                        <span class="caption">@{{ card.category }}</span>
                        <div>
                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                            <v-icon class="subheading primary--text pb-1">star</v-icon>
                            <v-icon class="subheading primary--text pb-1">star_half</v-icon>
                            4.6
                        </div>
                    </v-card-text>
                </v-card>
            </a>
        </v-flex>
    </v-layout>
</v-card>
