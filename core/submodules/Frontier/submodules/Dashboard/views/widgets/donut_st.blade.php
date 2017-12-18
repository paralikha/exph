<v-slide-y-transition>
    <v-card
        class="white--text elevation-1 mb-3"
        v-show="!removedonut_st"
        transition="slide-y-transition"
        style="#fff">
        <v-toolbar light class="transparent elevation-0 sortable-handle">
            <v-toolbar-title class="subheading w--500">Top 3 Users</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu bottom left>
                <v-btn icon slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                <v-list>
                    <v-list-tile @click="removedonut_st = !removedonut_st" ripple>
                        <v-list-tile-action>
                            <v-icon error class="error--text">remove_circle</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ __('Remove') }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="hidedonut_st = !hidedonut_st" ripple>
                        <v-list-tile-action>
                            <v-icon class="grey--text">@{{ hidedonut_st ? 'visibility' : 'visibility_off' }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ hidedonut_st ? 'Show' : 'Hide' }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-slide-y-transition>
            <v-card-text v-show="!hidedonut_st">
                <v-card dark flat class="transparent text-xs-center">
                    <v-card-text class="pt-0 pb-3 cyan--text text--darken-3">
                        <div class="body-2">Julian Appleseed,
                            <span class="caption cyan--text"><em>89 experience</em></span>
                        </div>
                    </v-card-text>
                </v-card>
                <div class="mini-donut-container">
                    <canvas id="donut_st"></canvas>
                </div>
            </v-card-text>
        </v-slide-y-transition>
    </v-card>
</v-slide-y-transition>

@push('css')
    <style>
        .alert {
            border-width: 0 !important;
        }
        .mini-donut-container {
            position: relative;
            height: 132px !important;
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
                    hidedonut_st: false,
                    removedonut_st: false,
                }
            }
        })
    </script>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('donut_st').getContext('2d');

        Chart.defaults.global.defaultFontColor = '#fff';
        Chart.defaults.global.legend.labels.usePointStyle = true;
        var chart  = new Chart(ctx, {
            type: 'doughnut',

            data: {
                labels: ["France Scott", "Gabrielle Smith", "Rebecca"],
                datasets: [{
                    backgroundColor: [
                        "rgba(0, 151, 167, 1)",
                        "rgba(38, 198, 218, 1)",
                        "rgba(128, 222, 234, 1)",
                    ],
                    borderColor: 'rgba(6, 23, 68, .02)',
                    borderWidth: 0,
                    data: [40, 89, 58],

                }]
            },

            options: {
                cutoutPercentage: 70,
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 1000,
                    easing: 'easeOutCubic'
                },
                legend: {
                    position: 'bottom',
                    display: true,
                    labels: {
                        fontColor: '#333',
                    },
                },
                elements: {
                    arc: {
                        borderWidth: 18,
                    },
                },
            }
        });
    </script>
@endpush
