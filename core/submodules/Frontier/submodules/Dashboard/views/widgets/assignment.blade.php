<v-slide-y-transition>
    <v-card class="elevation-1 mb-3" v-show="!removeassignment" transition="slide-y-transition">
        <v-card-media class="sortable-handle" src="{{ assets('frontier/images/placeholder/red2.jpg') }}">
            <div class="overlay-bg"></div>
            <v-layout column class="media">
                <v-card-title class="pa-0">
                    <v-spacer></v-spacer>
                    <v-menu bottom left>
                        <v-btn icon class="white--text" slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                        <v-list>
                            <v-list-tile @click="removeassignment = !removeassignment" ripple>
                                <v-list-tile-action>
                                    <v-icon error class="error--text">remove_circle</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        {{ __('Remove') }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile @click="hideassignment = !hideassignment" ripple>
                                <v-list-tile-action>
                                    <v-icon class="grey--text">@{{ hideassignment ? 'visibility' : 'visibility_off' }}</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        @{{ hideassignment ? 'Show' : 'Hide' }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-menu>
                </v-card-title>
                <v-spacer></v-spacer>
                <v-card-text class="white--text text-xs-center" v-show="!hideassignment">
                    <div class="title pb-3">Assignments</div>
                    <div class="display-2 weight-600"> 10 </div>
                    <div class="body-2 white--text mb-3">Total</div>
                    <v-btn round dark outline dark>View All</v-btn>
                </v-card-text>
            </v-layout>
        </v-card-media>
        <v-card-text class="pa-0" v-show="!hideassignment">
            <v-list three-line class="pa-0">
                <v-list-tile avatar ripple @click="">
                    <v-list-tile-content>
                        <v-list-tile-title>DPE-SUP PS7</v-list-tile-title>
                        <v-list-tile-sub-title><v-icon class="green--text body-1">schedule</v-icon> Aug 21, 2017</v-list-tile-sub-title>
                    </v-list-tile-content>
                    <v-list-tile-action>
                        <v-btn icon ripple v-tooltip:left="{ html: 'Download' }" href="{{ assets('frontier/images/placeholder/DPE_SUP_PS7_Assignment_1.pdf') }}" download>
                            <v-icon class="grey--text">file_download</v-icon>
                        </v-btn>
                    </v-list-tile-action>
                </v-list-tile>
                <v-divider></v-divider>
                <v-list-tile avatar ripple @click="">
                    <v-list-tile-content>
                        <v-list-tile-title>PSDM-SUP PS4 Reading Material</v-list-tile-title>
                        <v-list-tile-sub-title><v-icon class="green--text body-1">schedule</v-icon> Aug 20, 2017</v-list-tile-sub-title>
                    </v-list-tile-content>
                    <v-list-tile-action>
                        <v-btn icon ripple v-tooltip:left="{ html: 'Download' }" href="{{ assets('frontier/images/placeholder/PSDM SUP PS4 Reading Material.pdf') }}" download>
                            <v-icon class="grey--text">file_download</v-icon>
                        </v-btn>
                    </v-list-tile-action>
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
            background: rgba(86, 39, 39, 0.64);
            /*background: rgba(204, 96, 96, 0.64);*/
            z-index: 0;
        }
        .media .card__text {
            z-index: 1;
        }
        .weight-600 {
            font-weight: 600 !important;
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
                    hideassignment: false,
                    removeassignment: false,
                }
            }
        })
    </script>
@endpush
