<v-slide-y-transition>
    <v-card
        class="white--text elevation-1 mb-3"
        v-show="!removearea_t"
        transition="slide-y-transition"
        style="background: #fff;">
        <v-toolbar light class="transparent elevation-0 sortable-handle">
            <v-toolbar-title class="subheading w--500">Average Performance Statement Status</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-menu bottom left>
                <v-btn icon slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                <v-list>
                    <v-list-tile @click="removearea_t = !removearea_t" ripple>
                        <v-list-tile-action>
                            <v-icon error class="error--text">remove_circle</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ __('Remove') }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="hidearea_t = !hidearea_t" ripple>
                        <v-list-tile-action>
                            <v-icon class="grey--text">@{{ hidearea_t ? 'visibility' : 'visibility_off' }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ hidearea_t ? 'Show' : 'Hide' }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-slide-y-transition>
            <v-card-text v-show="!hidearea_t">
                <v-card dark flat class="transparent text-xs-center">
                    <v-card-text class="pt-0 pb-5 light-blue--text text--darken-3">
                        <div class="body-2">DPE OPS,
                            <span class="caption light-blue--text text--lighten-1"><em>89 students</em></span>
                        </div>
                    </v-card-text>
                </v-card>
                <div class="mini-chart-container">
                    <canvas id="area_t"></canvas>
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
                    hidearea_t: false,
                    removearea_t: false,
                }
            }
        })
    </script>
@endpush


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('area_t').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 100);
        gradient.addColorStop(0.25, 'rgba(3, 150, 243, .4)');
        gradient.addColorStop(0.5, 'rgba(3, 150, 243, .2)');
        gradient.addColorStop(1, 'rgba(3, 150, 243, 0)');

        Chart.defaults.global.defaultFontColor = '#fff';
        var chart = new Chart(ctx, {
            type: 'line',

            data: {
                labels: ["DPE SUP", "DPE OPS", "PSDM SUP", "PSDM OPS", "FECE SUP", "FEWT SUP", "MPPE OPS", "CREW OPS"],
                datasets: [{
                    label: "Average Performance Statement Status",
                    backgroundColor: gradient,
                    borderColor: "rgb(3, 150, 243)",
                    borderWidth: 2,
                    pointRadius: 4,
                    hoverBackgroundColor: "rgba(63, 81, 181, 0.4)",
                    hoverBorderColor: "rgba(63, 81, 181 ,1)",
                    data: [20, 89, 58, 73, 18, 58, 73, 18],
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
                            display: false
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
