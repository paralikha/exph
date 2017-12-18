@extends("Theme::layouts.auth")

@section("head-title", __($application->page->title))
@section("page-title", __($application->page->title))

@section("content")
<header>
    <v-toolbar class="elevation-3 white sticky" white>
        <a href="">
            <img src="{{ assets('frontier/images/consulting/logo.png') }}" alt="" width="120">
        </a>

        <div class="mx-4">
            <v-menu open-on-hover top offset-y>
                <v-btn flat slot="activator"><v-icon left>search</v-icon> Search</v-btn>
                <v-card id="search-hover" style="max-width: 777px !important;">
                    <v-select
                        autocomplete
                        label="What do you want to learn?"
                        slot="activator"
                        hide-details
                        append-icon=""
                        prepend-icon="search"
                        search-input
                        light solo hide-details
                        elevation-0>
                    </v-select>
                    <v-divider></v-divider>
                    <v-container fluid grid-list-lg>
                        <v-layout row wrap>
                            <v-flex xs6 sm3 v-for="card in exp">
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
                            <v-flex xs6 sm3 v-for="card in reco">
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
        <div class="hidden-sm-and-down">
            <v-btn small flat>{{ __('Home') }}</v-btn>
            <v-btn small flat>{{ __('Courses') }}</v-btn>
            <v-btn small flat>{{ __('Schedule') }}</v-btn>
            <v-btn small flat>{{ __('Contact Us') }}</v-btn>
        </div>
    </v-toolbar>
</header>
<main>
    <section id="hero">
        <v-parallax height="600" src="{{ assets('frontier/images/consulting/hero.jpg') }}">
            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%;"></div>
            <v-toolbar class="elevation-0 transparent sticky my-3" dark>
                <a href="">
                    <img class="pt-3" src="{{ assets('frontier/images/consulting/logo.png') }}" alt="" width="180">
                </a>
                <v-spacer></v-spacer>
                <div class="hidden-sm-and-down">
                    <v-btn small flat>{{ __('Home') }}</v-btn>
                    <v-btn small flat>{{ __('Courses') }}</v-btn>
                    <v-btn small flat>{{ __('Schedule') }}</v-btn>
                    <v-btn small flat>{{ __('Contact Us') }}</v-btn>
                </div>
            </v-toolbar>

            <v-layout column align-center justify-center class="white--text">
                <v-card dark class="elevation-0 transparent">
                    <h2 class="mb-2 text-xs-center"><strong>{{ __("Inspire - Transform - Empower") }}</strong></h2>
                    <h5 class="mb-3 text-xs-center fw-500">{{ __("Let us help you live the life you've imagined.") }}</h5>
                    <v-menu
                        offset-y
                        :close-on-content-click="false"
                        class="block"
                        v-model="search"
                        >
                        <v-select
                            autocomplete
                            label="What do you want to learn?"
                            slot="activator"
                            hide-details
                            append-icon=""
                            prepend-icon="search"
                            search-input
                            light solo hide-details>
                        </v-select>
                        <v-card class="pa-3" style="max-width: 740px !important;">
                            <v-container fluid grid-list-lg>
                                <v-layout row wrap>
                                    <v-flex xs6 sm3 v-for="card in exp">
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
                                    <v-flex xs6 sm3 v-for="card in reco">
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
            </v-layout>
        </v-parallax>
        <v-card-text class="white elevation-1 text-xs-center">
            <v-layout row wrap>
                <v-flex md4>
                    <v-avatar><v-icon class="info--text">place</v-icon></v-avatar> TBA
                </v-flex>
                <v-flex md4>
                    <v-avatar><v-icon class="info--text">place</v-icon></v-avatar> TBA
                </v-flex>
                <v-flex md4>
                    <v-avatar><v-icon class="info--text">place</v-icon></v-avatar> TBA
                </v-flex>
            </v-layout>
        </v-card-text>
    </section>
</main>

<div class="py-5">
    <section id="categories">
        <v-container fluid grid-list-lg>
            <v-layout row wrap>
                <v-flex lg10 offset-lg1 md12 sm12 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("POPULAR PROGRAMS") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
                    </v-card-text>
                    <v-layout row wrap align-center>
                        <v-flex xs12
                            v-bind="{ [`sm${card.flex}`]: true }"
                            v-for="card in courses"
                            :key="card.title"
                            >
                            <a href="" ripple class="td-n">
                                <v-card class="elevation-1 c-lift">
                                    <v-card-media
                                        :src="card.src"
                                        height="250px"
                                        >
                                        <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%;"></div>
                                        <v-container fill-height fluid class="pa-0 white--text">
                                            <v-layout row wrap align-center justify-center>
                                            <v-card class="elevation-0 transparent text-xs-center">
                                                <v-card-text>
                                                    <h4 class="mb-0 white--text text-xs-center"><strong>@{{ card.title }}</strong></h4>
                                                    <h6 class="white--text text-xs-center">@{{ card.sub }}</h6>
                                                </v-card-text>
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

    <section id="hotlist">
        <v-container fluid grid-list-lg>
            <v-layout row wrap>
                <v-flex lg10 offset-lg1 md12 sm12 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("CURATED COURSES") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
                    </v-card-text>
                    <v-layout row wrap align-center>
                        <v-flex xs12 sm6 md3 v-for="card in exp">
                            <a href="" ripple class="td-n">
                                <v-card class="elevation-1 c-lift">
                                    <v-card-media
                                        height="180px"
                                        :src="card.src"
                                        class="grey lighten-4">
                                        <v-container fill-height fluid class="pa-0 white--text">
                                            <v-layout column>
                                                <v-spacer></v-spacer>
                                                <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-card-text class="pa-0 white--text title text-xs-right">
                                                    <v-chip label class="ma-0 white--text primary">
                                                        <v-icon class="body-1 pr-2 white--text"> schedule</v-icon> @{{ card.duration }}
                                                    </v-chip>
                                                </v-card-text>
                                                </v-card-actions>
                                            </v-layout>
                                        </v-container>
                                    </v-card-media>
                                    <v-divider class="grey lighten-3"></v-divider>
                                    <v-toolbar card dense class="transparent pt-2">
                                        <v-toolbar-title class="mr-3 subheading">
                                            <span class="body-2">@{{ card.title }}</span><br>
                                            <span class="caption">@{{ card.caption }}</span><br>
                                        </v-toolbar-title>
                                    </v-toolbar>
                                    <v-card-text class="grey--text pt-4">
                                        <v-icon class="subheading grey--text text--lighten-1 pb-1">whatshot</v-icon>
                                        <span class="caption">@{{ card.category }}</span>
                                        <div>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star_half</v-icon>
                                            4.6
                                        </div>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn flat class="deep-orange--text text--darken-1 ml-2">Enroll</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </a>
                        </v-flex>
                    </v-layout>
                    <v-card-text class="text-xs-center">
                        <v-btn outline large class="primary--text">
                            {{ __('View All Courses') }}
                        </v-btn>
                    </v-card-text>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    <section id="recommended">
        <v-container fluid grid-list-lg>
            <v-layout row wrap>
                <v-flex lg10 offset-lg1 md12 sm12 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("RECOMMENDED COURSES") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
                    </v-card-text>
                    <v-layout row wrap align-center>
                        <v-flex xs12 sm6 md3 v-for="card in reco">
                            <a href="" ripple class="td-n">
                                <v-card class="elevation-1 c-lift">
                                    <v-card-media
                                        height="180px"
                                        :src="card.src"
                                        class="grey lighten-4">
                                        <v-container fill-height fluid class="pa-0 white--text">
                                            <v-layout column>
                                                <v-spacer></v-spacer>
                                                <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-card-text class="pa-0 white--text title text-xs-right">
                                                    <v-chip label class="ma-0 white--text primary">
                                                        <v-icon class="body-1 pr-2 white--text"> schedule</v-icon> @{{ card.duration }}
                                                    </v-chip>
                                                </v-card-text>
                                                </v-card-actions>
                                            </v-layout>
                                        </v-container>
                                    </v-card-media>
                                    <v-divider class="grey lighten-3"></v-divider>
                                    <v-toolbar card dense class="transparent pt-2">
                                        <v-toolbar-title class="mr-3 subheading">
                                            <span class="body-2">@{{ card.title }}</span><br>
                                            <span class="caption">@{{ card.caption }}</span><br>
                                        </v-toolbar-title>
                                    </v-toolbar>
                                    <v-card-text class="grey--text pt-4">
                                        <v-icon class="subheading grey--text text--lighten-1 pb-1">whatshot</v-icon>
                                        <span class="caption">@{{ card.category }}</span>
                                        <div>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star</v-icon>
                                            <v-icon class="subheading deep-orange--text text--darken-1 pb-1">star_half</v-icon>
                                            4.6
                                        </div>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn flat class="deep-orange--text text--darken-1 ml-2">Enroll</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </a>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>

    <section id="video">
        <v-layout row wrap>
            <v-flex xs12>
                <v-layout row wrap align-center>
                    <v-flex xs12>
                        {{-- <v-parallax class="mb-4 mt-5" height="450" src="{{ assets('frontier/images/consulting/r11.jpg') }}">
                            <v-layout
                                column
                                align-center
                                justify-center
                                class="white--text"
                                >
                                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%;"></div>
                                <v-card dark class="elevation-0 transparent text-xs-center">
                                    <v-card-text>
                                        <h3 class="mb-2"><strong>{{ __("We inspire positive change.") }}</strong></h3>
                                        <h6 class="fw-400">We bring together people who share the same passion to learn, unlearn and re-learn.</h6>
                                        <a class="td-n" href="">
                                            <v-avatar v-tooltip:bottom="{ html: 'Click to watch the video' }">
                                                <v-icon class="display-3 white--text">play_circle_filled</v-icon>
                                            </v-avatar>
                                        </a>
                                    </v-card-text>
                                </v-card>
                            </v-layout>
                        </v-parallax> --}}
                        <v-card class="elevation-0 mb-4 mt-5">
                            <v-card-media
                                src="{{ assets('frontier/images/consulting/r11.jpg') }}"
                                height="450px"
                                >
                                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%;"></div>
                                <v-container fill-height fluid class="pa-0 white--text">
                                    <v-layout row wrap align-center justify-center>
                                    <v-card dark class="elevation-0 transparent text-xs-center">
                                        <v-card-text>
                                            <h3 class="mb-2"><strong>{{ __("We inspire positive change.") }}</strong></h3>
                                            <h6 class="fw-400">We bring together people who share the same passion to learn, unlearn and re-learn.</h6>
                                            <a class="td-n" href="">
                                                <v-avatar v-tooltip:bottom="{ html: 'Click to watch the video' }">
                                                    <v-icon class="display-3 white--text">play_circle_filled</v-icon>
                                                </v-avatar>
                                            </a>
                                        </v-card-text>
                                    </v-card>
                                    </v-layout>
                                </v-container>
                            </v-card-media>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </section>

    <section id="stories">
        <v-container fluid grid-list-lg>
            <v-layout row wrap>
                <v-flex lg10 offset-lg1 md12 sm12 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("BLOG") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">News, updates and articles that Inspire and Empower</h2>
                    </v-card-text>
                    <v-layout row wrap>
                        <v-flex sm6 xs12>
                            <v-layout row wrap>
                                <v-flex xs12>
                                    <v-layout row wrap>
                                        <v-flex xs12>
                                            <a href="" class="td-n">
                                                <v-card class="elevation-1 c-lift">
                                                    <v-card-media
                                                        src="{{ assets('frontier/images/consulting/r12.jpg') }}"
                                                        height="200px"
                                                        >
                                                        <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                                        <v-container fill-height fluid class="pa-0 white--text">
                                                            <v-layout row wrap align-end justify-left>
                                                            <v-card dark class="elevation-0 transparent">
                                                                <v-card-text class="py-3 px-4 white--textbody-2">
                                                                <div class="body-2">5 Pieces Career Advice For Millennials</div>
                                                                <div class="caption">November 13, 2017</div>
                                                                <div class="caption">by Jane Appleseed</div>
                                                            </v-card-text>
                                                            </v-card>
                                                            </v-layout>
                                                        </v-container>
                                                    </v-card-media>
                                                </v-card>
                                            </a>
                                        </v-flex>
                                    </v-layout>
                                    <v-layout row wrap>
                                        <v-flex sm6 xs12>
                                            <a href="" class="td-n">
                                                <v-card class="elevation-1 c-lift">
                                                    <v-card-media
                                                        src="{{ assets('frontier/images/consulting/r9.jpg') }}"
                                                        height="200px"
                                                        >
                                                        <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                                        <v-container fill-height fluid class="pa-0 white--text">
                                                            <v-layout row wrap align-end justify-left>
                                                                <v-card dark class="elevation-0 transparent">
                                                                    <v-card-text class="py-3 px-4 white--textbody-2">
                                                                    <div class="body-2">5 Pieces Career Advice For Millennials</div>
                                                                    <div class="caption">October 16, 2017</div>
                                                                    <div class="caption">by Jane Appleseed</div>
                                                                </v-card-text>
                                                                </v-card>
                                                            </v-layout>
                                                        </v-container>
                                                    </v-card-media>
                                                </v-card>
                                            </a>
                                        </v-flex>
                                        <v-flex sm6 xs12>
                                            <a href="" class="td-n">
                                                <v-card class="elevation-1 c-lift">
                                                    <v-card-media
                                                        src="{{ assets('frontier/images/consulting/r17.jpg') }}"
                                                        height="200px"
                                                        >
                                                        <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                                        <v-container fill-height fluid class="pa-0 white--text">
                                                            <v-layout row wrap align-end justify-left>
                                                                <v-card dark class="elevation-0 transparent">
                                                                    <v-card-text class="py-3 px-4 white--textbody-2">
                                                                    <div class="body-2">5 Pieces Career Advice For Millennials</div>
                                                                    <div class="caption">August 7, 2017</div>
                                                                    <div class="caption">by Jane Appleseed</div>
                                                                </v-card-text>
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
                        </v-flex>
                        <v-flex sm6 xs12>
                            <a href="" class="td-n">
                                <v-card class="elevation-1 c-lift" height="100%">
                                    <v-card-media
                                        src="{{ assets('frontier/images/consulting/r13.jpg') }}"
                                        height="100%"
                                        style="min-height: 200px;"
                                        >
                                        <div class="insert-overlay" style="background: rgba(33, 150, 243, 0.15); position: absolute; width: 100%; height: 100%;"></div>
                                        <v-container fill-height fluid class="pa-0 white--text">
                                            <v-layout row wrap align-end justify-left>
                                                <v-card dark class="elevation-0 transparent">
                                                    <v-card-text class="py-3 px-4 white--textbody-2">
                                                    <div class="body-2">5 Pieces Career Advice For Millennials</div>
                                                    <div class="caption">October 9, 2017</div>
                                                    <div class="caption">by Jane Appleseed</div>
                                                </v-card-text>
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

    <section id="partnership">
        <v-container fluid>
            <v-layout row wrap>
                <v-flex lg8 offset-lg2 md12 sm12 xs12>
                    <v-card-text class="text-xs-center my-3">
                        <h2 class="display-1">{{ __("PARTNERSHIPS") }}</h2>
                        <h2 class="subheading grey--text text--darken-1">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</h2>
                    </v-card-text>
                    <v-layout row wrap>
                        <v-flex sm3 xs12>
                            <v-card-text class="text-xs-center">
                                <img src="{{ assets('frontier/images/consulting/logo.png') }}" width="100%" alt="" style="max-width: 120px !important;">
                            </v-card-text>
                        </v-flex>
                        <v-flex sm3 xs12>
                            <v-card-text class="text-xs-center">
                                <img src="{{ assets('frontier/images/consulting/logo.png') }}" width="100%" alt="" style="max-width: 120px !important;">
                            </v-card-text class="text-xs-center">
                        </v-flex>
                        <v-flex sm3 xs12>
                            <v-card-text class="text-xs-center">
                                <img src="{{ assets('frontier/images/consulting/logo.png') }}" width="100%" alt="" style="max-width: 120px !important;">
                            </v-card-text>
                        </v-flex>
                        <v-flex sm3 xs12>
                            <v-card-text class="text-xs-center">
                                <img src="{{ assets('frontier/images/consulting/logo.png') }}" width="100%" alt="" style="max-width: 120px !important;">
                            </v-card-text>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </section>
</div>
<section id="cta">
    <v-layout row wrap>
        <v-flex xs12>

            <v-card class="elevation-0"
                >
                <v-card-media src="{{ assets('frontier/images/consulting/r8.jpg') }}" width="100%">
                    <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.6); position: absolute; width: 100%; height: 100%;"></div>
                    <v-card-text class="pa-0 py-5">
                        <v-layout row wrap>
                            <v-flex lg8 offset-lg2>
                                <v-card dark class="elevation-0 transparent">
                                    <v-card-text class="text-xs-center">
                                        <h4 class="mb-2">Inspire - Transform - Empower</h4>
                                        <div class="title">Let us help you live the life you've imagined.</div>
                                    </v-card-text>
                                </v-card>
                                <v-layout row wrap>
                                    <v-flex md5 sm5 xs12>
                                        <v-card-text>
                                            <v-menu
                                                :close-on-content-click="false"
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
                                                    append-icon="keyboard_arrow_down"
                                                    light solo hide-details single-line
                                                    placeholder="Select Program"
                                                    v-model="schedule"
                                                    readonly
                                                ></v-text-field>
                                                <v-date-picker v-model="to" no-title scrollable actions>
                                                </v-date-picker>
                                            </v-menu>
                                        </v-card-text>
                                    </v-flex>
                                    <v-flex md5 sm5 xs12>
                                        <v-card-text>
                                            <v-menu
                                                :close-on-content-click="false"
                                                v-model="from"
                                                transition="scale-transition"
                                                right
                                                bottom
                                                full-width
                                                max-width="290px"
                                                min-width="290px"
                                                >
                                                <v-text-field
                                                    slot="activator"
                                                    append-icon="keyboard_arrow_down"
                                                    light solo hide-details single-line
                                                    placeholder="Select Level"
                                                    v-model="schedule"
                                                    readonly
                                                ></v-text-field>
                                                <v-date-picker v-model="from" no-title scrollable actions>
                                                </v-date-picker>
                                            </v-menu>
                                        </v-card-text>
                                    </v-flex>
                                    <v-flex md2 sm2 xs12>
                                        <v-card-text class="text-xs-center">
                                            <v-btn large flat round primary class="white--text" style="background: #fdbe3c !important;">Go</v-btn>
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

<footer>
    <v-layout row wrap>
        <v-flex xs12>
            <v-card class="elevation-0 black py-5">
                <v-layout row wrap>
                    <v-flex lg10 offset-lg1 md12 sm12>
                        <v-container fill-height fluid class="pa-0 white--text">
                            <v-layout row wrap align-top justify-top>
                                <v-flex sm4 xs12>
                                    <v-card dark class="elevation-0 transparent">
                                        <v-card-text class="grey--text">
                                            <img src="{{ assets('frontier/images/consulting/logo.png') }}" alt="" width="120">
                                            <div class="body-2 mb-1">About SSA Consulting Group</div>
                                            <div class="caption mb-3">
                                                SSA Consulting Group (SSA) is an umbrella corporation providing professional services, for nearly three decades, in the areas of training, management consulting, public accounting, estate planning.
                                            </div>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex sm3 offset-sm1 xs12>
                                    <v-card dark class="elevation-0 transparent">
                                        <v-card-text class="body-1">
                                            <v-layout row wrap>
                                                <v-flex sm5 offset-sm1>
                                                    <div class="body-2 mb-2 white--text">SSA Consulting</div>
                                                    <div class="mb-2">
                                                    <a href="" class="td-n grey--text">
                                                        Home
                                                    </a>
                                                    </div>
                                                    <div class="mb-2"><a href="" class="td-n grey--text">
                                                        Courses
                                                    </a></div>
                                                    <div class="mb-2"><a href="" class="td-n grey--text">
                                                        Schedule
                                                    </a></div>
                                                    <div class="mb-2"><a href="" class="td-n grey--text">
                                                        Contact Us
                                                    </a></div>
                                                </v-flex>
                                            </v-layout>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex sm4 xs12>
                                    <v-card dark class="elevation-0 transparent">
                                        <v-card-text class="body-1 grey--text">
                                            <div class="body-2 mb-2 white--text">Contact Us</div>
                                            {{-- <v-btn outline class="mb-2 mx-0 grey--text">Ask Us</v-btn> --}}
                                            <div>Fax: +65 6842 2202</div>
                                            <div>Landline: +65 6842 2282</div>
                                            <div>Email: contact@ssagroup.com</div>
                                            <div>11 Eunos Road 8 #06-01 Lobby A,Lifelong Learning <br> Institute, Singapore 408601</div>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </v-card>

            <v-card class="elevation-0 black">
                <v-layout row wrap>
                    <v-flex lg10 offset-lg1 md12 sm12>
                        <v-divider class="grey darken-3"></v-divider>
                        <v-card-actions>
                            <div class="caption grey--text">© 2017 SSA Consulting Group Pte. Ltd. All rights reserved.</div>
                            <v-spacer></v-spacer>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-facebook</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-twitter</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-youtube</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-instagram</v-icon></v-btn>
                            <v-btn icon class="social"><v-icon class="subheading grey--text">fa fa-pinterest</v-icon></v-btn>
                        </v-card-actions>
                    </v-flex>
                </v-layout>
            </v-card>
        </v-flex>
    </v-layout>
</footer>
@endsection

@push('css')
    <style>
        .hero-search .input-group.input-group--solo {
            min-height: 55px !important;
        }
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        #hero .parallax__content {
            padding: 0;
        }
        #video .parallax__content {
            padding: 0;
        }
        .block {
            display: block !important;
        }
        footer a:hover,
        .social:hover {
            color: #ff6600 !important;
        }
        .c-lift {
            transition: all .2s ease;
        }
        .c-lift:hover {
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
            box-shadow: 0 1px 8px rgba(0,0,0,.2),0 3px 4px rgba(0,0,0,.14),0 3px 3px -2px rgba(0,0,0,.12) !important;
        }
        /**/
        header {
            position: fixed;
            display: none;
            width: 100%;
            height: 60px;
            background: red;
        }
        #search-hover .input-group.input-group--solo {
            background: #fff;
            min-height: 46px;
            border-radius: 2px;
            padding: 0;
            box-shadow: none;
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
                    states: [
                    'alabama', 'durian'],
                    from: null,
                    to: null,
                    schedule: null,
                    menu: false,
                    menu: false,
                    search: null,
                    courses: [
                        {
                            title: 'EDGE',
                            sub: 'Executive Development and Growth for Excellence',
                            src: 'http://www.training.ssagroup.com/assets/images/program/icdl.jpg',
                            flex: 8
                        },
                        {
                            title: 'WPLN',
                            sub: 'Workplace Literacy & Numberacy',
                            src: 'http://www.training.ssagroup.com/assets/images/wpln/Workplace%20Numeracy%20-%20Beginner.jpg',
                            flex: 4,
                            height: '100%'
                        },
                        {
                            title: 'WPS',
                            sub: 'Workplace Skills',
                            src: 'http://www.training.ssagroup.com/assets/images/wps/Adapt%20to%20Change.jpg',
                            flex: 3
                        },
                        {
                            title: 'ICDL',
                            sub: 'International Computer Driving Licence',
                            src: 'http://www.training.ssagroup.com/assets/images/icdl/Perform%20Essential%20Online%20Functions.jpg',
                            flex: 6
                        },

                        {
                            title: 'GMS',
                            sub: 'Generic Manufacturing Skills',
                            src: 'http://www.training.ssagroup.com/assets/images/gms/Apply%20Quality%20Systems.jpg',
                            flex: 3
                        },
                    ],
                    exp: [
                        {
                            title: 'Workplace Literacy (Comprehensive) - Beginner',
                            duration: '90hrs',
                            category: 'WPLN',
                            caption: 'This module is developed to enhance the speaking and listening proficiency of learners to meet the workplace needs.',
                            src: '{{ assets('frontier/images/consulting/r5.jpg') }}'
                        },
                        {
                            title: 'Contribute to the Design and Development of a Productivity Framework',
                            duration: '16hrs',
                            category: 'EDGE',
                            caption: 'Conduct productivity diagnosis by recommending areas for improvement, establishing productivity goals and strategies, and developing a performance management system.',
                            src: 'http://www.training.ssagroup.com/assets/images/edge/Solve%20Problems%20and%20Make%20Decisions%20on%20a%20Managerial%20Level.jpg'
                        },
                        {
                            title: 'Perform Project Planning Functions (MS Project 2010)',
                            duration: '16hrs',
                            category: 'ICDL',
                            caption: 'Enable participants to use MS Project 2010, a project management software, to prepare project plans and monitor projects, including planning and managing time, costs, tasks and resources.',
                            src: 'http://www.training.ssagroup.com/assets/images/icdl/Demonstrate%20Understanding%20of%20Concepts%20of%20IT%20Security.jpg'
                        },
                        {
                            title: 'Maintain Personal Presentation and Employability at Operations Level',
                            duration: '16hrs',
                            category: 'WPS',
                            caption: 'Trainer is very good at explaining, and taught us how to dress up properly for interviews and how to react to different situations.',
                            src: 'http://www.training.ssagroup.com/assets/images/wps/Develop%20Personal%20Effectiveness%20at%20Operations%20Level.jpg'
                        }
                    ],
                    reco: [
                        {
                            title: 'Workplace Literacy (Conversational) - Beginner',
                            duration: '45hrs',
                             category: 'WPLN',
                            caption: 'At the end of the module the participant will be able to handle very routine entry-level jobs that do not require sophisticated conversations in English.',
                            src: '{{ assets('frontier/images/consulting/r3.jpg') }}'
                        },
                        {
                            title: 'Use ICT for Knowledge Management',
                            duration: '16hrs',
                            category: 'EDGE',
                            caption: 'Acquire skills and enhance understanding of knowledge management concepts and their role in an organisation.',
                            src: '{{ assets('frontier/images/consulting/r4.jpg') }}'
                        },
                        {
                            title: 'Demonstrate Understanding of Concepts of IT Security',
                            duration: '16hrs',
                            category: 'ICDL',
                            caption: 'Gain an understanding of the different parts of a computer and key concepts in ICT such as those relating to networks and security.',
                            src: '{{ assets('frontier/images/consulting/r9.jpg') }}'
                        },
                        {
                            title: 'Solve Problems and Make Decisions at Operations Level',
                            duration: '16hrs',
                            category: 'WPS',
                            caption: 'Acquire the techniques in problem solving and decision making, including proactively identifying root causes to a problem',
                            src: '{{ assets('frontier/images/consulting/r6.jpg') }}'
                        }
                    ],
                }
            },
        });
    </script>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script>
        $(window).scroll(function () {
            if ( $(this).scrollTop() > 600 && !$('header').hasClass('open') ) {
                $('header').addClass('open');
                $('header').slideDown(200);
            } else if ( $(this).scrollTop() <= 600 ) {
                $('header').removeClass('open');
                $('header').slideUp(200);
            }
        });
    </script>
@endpush
