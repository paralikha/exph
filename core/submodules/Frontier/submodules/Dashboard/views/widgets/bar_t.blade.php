<v-slide-y-transition>
    <v-card
        class="white--text elevation-1 mb-3"
        v-show="!removebar_t"
        transition="slide-y-transition"
        style="background: #fff;">
        <v-toolbar light class="transparent elevation-0 sortable-handle">
            <v-toolbar-title class="subheading w--500">Most Active Learners</v-toolbar-title>
            <v-spacer></v-spacer>

            <v-menu bottom left>
                <v-btn icon slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                <v-list>
                    <v-list-tile @click="removebar_t = !removebar_t" ripple>
                        <v-list-tile-action>
                            <v-icon error class="error--text">remove_circle</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ __('Remove') }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="hidebar_t = !hidebar_t" ripple>
                        <v-list-tile-action>
                            <v-icon class="grey--text">@{{ hidebar_t ? 'visibility' : 'visibility_off' }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ hidebar_t ? 'Show' : 'Hide' }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-slide-y-transition>
            <v-card-text v-show="!hidebar_t">
                <v-card dark flat class="transparent text-xs-center">
                    <v-card-text class="pt-0 pb-5 cyan--text text--darken-3">
                        <div class="body-2">Julianna Roberts,
                            <span class="caption cyan--text text--lighten-1"><em>88%</em></span>
                        </div>
                    </v-card-text>
                </v-card>
                <div class="mini-chart-container">
                    <canvas id="bar_t"></canvas>
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
                    hidebar_t: false,
                    removebar_t: false,
                }
            }
        })
    </script>
@endpush


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('bar_t').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 100);
        gradient.addColorStop(0.25, 'rgba(0, 188, 212, .9)');
        gradient.addColorStop(0.5, 'rgba(0, 188, 212, .9)');
        gradient.addColorStop(1, 'rgba(0, 188, 212, .9)');

        Chart.defaults.global.defaultFontColor = '#fff';
        var chart = new Chart(ctx, {
            type: 'bar',

            data: {
                labels: ["Ross Geller", "Julianna Roberts", "Monica Scott", "Anna Smith", "Rachel Green", "Jane Appleseed", "Jeffrey Way", "Steve Harrington"],
                datasets: [{
                    label: "Active Learner",
                    backgroundColor: gradient,
                    borderColor: "rgb(0, 188, 212)",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(0, 188, 212, 1)",
                    hoverBorderColor: "rgba(0, 188, 212, 1)",
                    data: [20, 88, 58, 73, 18, 58, 73, 18],
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
