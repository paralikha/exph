@extends("Theme::layouts.admin")

@section("content")

    <v-container fluid>
        @include("Theme::partials.banner")
        <v-layout row wrap>
            <v-flex sm6 md8 xs12 offset-md2>

                <v-card class="mb-3 elevation-1">
                    <v-toolbar class="transparent elevation-0">
                        <v-toolbar-title class="accent--text">{{ __('Review Settings') }}</v-toolbar-title>
                    </v-toolbar>

                    <form action="{{ route('settings.store') }}" method="POST">
                        {{ csrf_field() }}
                        <v-subheader>{{ __('Featured Reviews') }}</v-subheader>
                        <v-card-text>
                            <p class="body-1 grey--text">{{ __('Featured reviews will be displayed at the homepage.') }}</p>

                            <input type="hidden" name="homepage_reviews[]" v-for="(r,i) in resource.item.reviews" :key="i" :value="r">
                            <v-select multiple v-model="resource.item.reviews" autocomplete :items="resource.selections.reviews" item-value="id" item-text="body">
                                <template slot="selection" scope="data">
                                    <v-chip
                                      close
                                      @input="data.parent.selectItem(data.item)"
                                      :selected="data.selected"
                                      class="chip--select-multi"
                                      :key="JSON.stringify(data.item)"
                                    >
                                        <v-avatar>
                                            <img :src="data.item.useravatar">
                                        </v-avatar>
                                        <span v-html="data.item.body"></span>
                                    </v-chip>
                                </template>
                                <template slot="item" scope="data">
                                    <template v-if="typeof data.item !== 'object'">
                                        <v-list-tile-content v-text="data.item"></v-list-tile-content>
                                    </template>
                                    <template v-else>
                                        <v-list-tile-avatar>
                                            <img v-bind:src="data.item.useravatar">
                                        </v-list-tile-avatar>
                                        <v-list-tile-content>
                                            <v-list-tile-title v-html="data.item.body"></v-list-tile-title>
                                            <v-list-tile-sub-title>
                                                <v-icon v-for="(s,i) in parseInt(data.item.rating)" :key="i">star</v-icon>
                                            </v-list-tile-sub-title>
                                        </v-list-tile-content>
                                    </template>
                                </template>
                            </v-select>

                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn type="submit" primary>{{ __('Save') }}</v-btn>
                        </v-card-actions>
                    </form>

                </v-card>

            </v-flex>
        </v-layout>
    </v-container>
@endsection

@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        item: {
                            reviews: {!! json_encode(old('homepage_reviews', unserialize(settings('homepage_reviews', [])))) !!}
                        },
                        selections: {
                            reviews: {!! json_encode($reviews->toArray()) !!},
                        },
                    },
                };
            },
        });
    </script>
@endpush
