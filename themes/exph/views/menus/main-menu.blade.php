<v-toolbar flat class="white">
    <v-avatar tile>
        <img src="{{ $application->site->logo }}" alt="{{ $application->site->title }}" width="80" style="padding-top: 8px;">
    </v-avatar>
    <div class="hidden-lg-and-up">
        <v-menu
            transition="slide-x-transition"
            bottom
            right
            :nudge-width="200"
            >
            <v-btn icon slot="activator" v-tooltip:bottom="{html:'Menu'}"><v-icon>keyboard_arrow_down</v-icon></v-btn>
            <v-list>
                <v-list-tile ripple href="\experiences">
                    <v-list-tile-title>Experience</v-list-tile-title>
                </v-list-tile>
                <v-list-tile ripple href="\roadtrips">
                    <v-list-tile-title>Road Trips</v-list-tile-title>
                </v-list-tile>
                <v-list-tile ripple href="\budgets">
                    <v-list-tile-title>Pack &amp; Go</v-list-tile-title>
                </v-list-tile>
                <v-list-tile ripple href="\stories">
                    <v-list-tile-title>Stories</v-list-tile-title>
                </v-list-tile>
                <v-list-tile ripple href="\host">
                    <v-list-tile-title class="success--text fw-500">Become a Host</v-list-tile-title>
                </v-list-tile>
                <v-divider></v-divider>
                <v-list-tile ripple href="\myprofile">
                    <v-list-tile-action>
                        <v-icon>account_circle</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title>My Profile</v-list-tile-title>
                </v-list-tile>
                <v-list-tile ripple href="\notifications">
                    <v-list-tile-action>
                        <v-icon>settings</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title>Account Settings</v-list-tile-title>
                </v-list-tile>
                <v-list-tile ripple href="\logout">
                    <v-list-tile-action>
                        <v-icon>exit_to_app</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title>Log out</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-menu>
    </div>

    <div class="hidden-sm-and-down">
        <v-menu open-on-hover top offset-y>
            <v-btn flat slot="activator" class="grey--text text--darken-1"><v-icon left>search</v-icon>Search</v-btn>
            <v-card id="search-hover" style="max-width: 600px !important;">
                <v-select
                    autocomplete
                    label="What do you want to experience?"
                    slot="activator"
                    hide-details
                    append-icon=""
                    prepend-icon="search"
                    search-input
                    light solo hide-details
                    class="elevation-0">
                </v-select>
                <v-divider></v-divider>
                <v-container fluid grid-list-lg>
                    <v-layout row wrap>
                        <v-flex xs6 sm3 v-for="card in ssrch">
                            <a href="" class="td-n">
                                <v-card class="elevation-1">
                                    <v-card-media :src="card.src" width="100%" height="120">
                                        <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; width: 100%; height: 100%;"></div>
                                        <v-card-text>
                                            <v-container fill-height fluid class="pa-0 white--text">
                                                <v-layout row wrap align-center justify-center>
                                                <v-card class="elevation-0 transparent text-xs-center">
                                                   <div class="caption white--text text-xs-center">@{{ card.title }}</div>
                                                </v-card>
                                                </v-layout>
                                            </v-container>
                                        </v-card-text>
                                    </v-card-media>
                                </v-card>
                            </a>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card>
        </v-menu>
    </div>

    <v-spacer></v-spacer>
    @include("Template::recursives.main-menu", ['items' => get_navmenus('main-menu')])
</v-toolbar>
