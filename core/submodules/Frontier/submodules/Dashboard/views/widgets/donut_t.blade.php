<v-slide-y-transition>
    <v-card
        class="white--text elevation-1 mb-3"
        v-show="!removedonut_t"
        transition="slide-y-transition"
        style="background: #fff;">
        <v-toolbar light class="transparent elevation-0 sortable-handle">
            <v-toolbar-title class="subheading w--500">Top 3 Most Viewed Stories</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu bottom left>
                <v-btn icon slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                <v-list>
                    <v-list-tile @click="removedonut_t = !removedonut_t" ripple>
                        <v-list-tile-action>
                            <v-icon error class="error--text">remove_circle</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ __('Remove') }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="hidedonut_t = !hidedonut_t" ripple>
                        <v-list-tile-action>
                            <v-icon class="grey--text">@{{ hidedonut_t ? 'visibility' : 'visibility_off' }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ hidedonut_t ? 'Show' : 'Hide' }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-slide-y-transition>
            <v-card-text v-show="!hidedonut_t">
                <v-card dark flat class="transparent text-xs-center">
                    <v-card-text class="pt-0 pb-3 pink--text text--darken-1">
                        <div class="body-2">RTM: Janrey Ligutan,
                            <span class="caption pink--text text--lighten-1"><em>89 views</em></span>
                        </div>
                    </v-card-text>
                </v-card>
                <div class="mini-donut-container">
                    <canvas id="donut_t"></canvas>
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
                    hidedonut_t: false,
                    removedonut_t: false,
                }
            }
        })
    </script>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('donut_t').getContext('2d');

        Chart.defaults.global.defaultFontColor = '#fff';
        Chart.defaults.global.legend.labels.usePointStyle = true;
        var chart  = new Chart(ctx, {
            type: 'doughnut',

            data: {
                labels: ["RTM 1", "RTM 2", "RTM 3"],
                datasets: [{
                    backgroundColor: [
                        "rgba(194, 24, 91, 1)",
                        "rgba(236, 64, 122, 1)",
                        "rgba(244, 143, 177, 1)",
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
