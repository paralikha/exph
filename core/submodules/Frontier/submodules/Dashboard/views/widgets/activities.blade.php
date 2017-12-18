<v-slide-y-transition>
    <v-card class="elevation-1 mb-3" v-show="!removeactivities" transition="slide-y-transition">
        <v-card-media class="sortable-handle" src="{{ assets('frontier/images/placeholder/windmill.jpg') }}">
            <div class="insert-overlay" style="background: rgba(3, 60, 105, 0.53); position: absolute; width: 100%; height: 100%;"></div>
            <v-layout column class="media">
                <v-card-title class="pa-0">
                    <v-spacer></v-spacer>
                    <v-menu bottom left>
                        <v-btn icon class="white--text" slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                        <v-list>
                            <v-list-tile @click="removeactivities = !removeactivities" ripple>
                                <v-list-tile-action>
                                    <v-icon error class="error--text">remove_circle</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        {{ __('Remove') }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile @click="hideactivities = !hideactivities" ripple>
                                <v-list-tile-action>
                                    <v-icon class="grey--text">@{{ hideactivities ? 'visibility' : 'visibility_off' }}</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        @{{ hideactivities ? 'Show' : 'Hide' }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-menu>
                </v-card-title>
                <v-spacer></v-spacer>
                <v-card-text class="white--text text-xs-center" v-show="!hideactivities">
                    <div class="title pb-3">Activities</div>
                    <div class="display-2 weight-600"> 17 </div>
                    <div class="body-2 white--text mb-3">Online</div>
                    <v-btn round dark outline dark href="">View All</v-btn>
                </v-card-text>
            </v-layout>
        </v-card-media>
        <v-divider></v-divider>
        <v-card-text class="pa-0" v-show="!hideactivities">
            <v-list three-line class="pa-0">
                <v-list-tile avatar ripple  @click="">
                    <v-list-tile-avatar small>
                        <img src="https://placeimg.com/640/480/any/grayscale/1"/>
                      </v-list-tile-avatar>
                    <v-list-tile-content>
                        <v-list-tile-title>Paul Smith</v-list-tile-title>
                        <v-list-tile-sub-title>booked an experience for Random Road Trip #1</v-list-tile-sub-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-divider inset></v-divider>
                <v-list-tile avatar ripple  @click="">
                    <v-list-tile-avatar>
                        <img src="https://placeimg.com/640/480/any/grayscale/2"/>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                        <v-list-tile-title>Julianna Robert</v-list-tile-title>
                        <v-list-tile-sub-title>commented on Random Road Trip #22</v-list-tile-sub-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-card-text>
    </v-card>
</v-slide-y-transition>

@push('css')
    <style>
        .overlay-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        .media .card__text {
            z-index: 1;
        }
        .weight-600 {
            font-weight: 600 !important;
        }
        .list--three-line .list__tile__sub-title {
            -webkit-box-orient: vertical;
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
                    items: [],
                    hideactivities: false,
                    removeactivities: false,
                }
            }
        })
    </script>
@endpush
