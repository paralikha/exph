<v-slide-y-transition>
    <v-card
        class="white elevation-1 mb-3"
        v-show="!removearea_st"
        transition="slide-y-transition">
        <v-toolbar light class="transparent elevation-0 sortable-handle">
            <v-toolbar-title class="subheading w--500">Top Travel Managers</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-menu bottom left>
                <v-btn icon slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                <v-list>
                    <v-list-tile @click="removearea_st = !removearea_st" ripple>
                        <v-list-tile-action>
                            <v-icon error class="error--text">remove_circle</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ __('Remove') }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="hidearea_st = !hidearea_st" ripple>
                        <v-list-tile-action>
                            <v-icon class="grey--text">@{{ hidearea_st ? 'visibility' : 'visibility_off' }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ hidearea_st ? 'Show' : 'Hide' }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-slide-y-transition>
            <v-card-text v-show="!hidearea_st">
                <v-card dark flat class="transparent text-xs-center">
                    <v-card-text class="pt-0 pb-5 pink--text text--darken-1">
                        <div class="body-2">Cole Sprouse,
                            <span class="caption pink--text text--lighten-1"><em>98%</em></span>
                        </div>
                    </v-card-text>
                </v-card>
                <div class="mini-chart-container">
                    <canvas id="area_st"></canvas>
                </div>
            </v-card-text>
        </v-slide-y-transition>
    </v-card>
</v-slide-y-transition>

@push('css')
    <style>
        .mini-chart-container {
            position: relative;
            height: 100px;
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
                    hidearea_st: false,
                    removearea_st: false,
                }
            }
        })
    </script>
@endpush


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('area_st').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 100);
        gradient.addColorStop(0.25, 'rgba(236, 64, 122, .4)');
        gradient.addColorStop(0.5, 'rgba(236, 64, 122, .2)');
        gradient.addColorStop(1, 'rgba(236, 64, 122, 0)');

        Chart.defaults.global.defaultFontColor = '#fff';
        var chart = new Chart(ctx, {
            type: 'line',

            data: {
                labels: [
                    "Paul Appleseed",
                    "Jane Doe",
                    "Anna Scott",
                    "Robin Scott",
                    "Jonathan",
                    "Sherlock Holmes",
                    "Rachel Green",
                    "Ulesys"
                ],
                datasets: [{
                    label: "Rating",
                    backgroundColor: gradient,
                    borderColor: "rgb(236, 64, 122)",
                    borderWidth: 2,
                    pointRadius: 4,
                    hoverBackgroundColor: "rgba(236, 64, 122, 0.4)",
                    hoverBorderColor: "rgba(236, 64, 122 ,.8)",
                    data: [26, 89, 58, 83, 38, 58, 83, 38],
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            color: "rgba(255,99,132,0.2)"
                        },
                        ticks: {
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: "#fff",
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutCubic'
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                }
            }
        });
    </script>
@endpush
