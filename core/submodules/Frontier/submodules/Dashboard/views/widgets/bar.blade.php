<v-slide-y-transition>
    <v-card
        class="white--text elevation-1 mb-3"
        v-show="!removebar"
        transition="slide-y-transition"
        {{-- style="background: linear-gradient(141deg, rgb(0, 0, 0) 0%, rgb(2, 16, 51) 51%, rgb(0, 0, 0) 75%);"> --}}
        style="background: #fff;">
        <v-toolbar light class="transparent elevation-0 sortable-handle">
           <v-toolbar-title class="subheading w--500">Traffic Source Indicators</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu bottom left>
                <v-btn icon slot="activator" v-tooltip:left="{ html: 'More Actions' }"><v-icon>more_vert</v-icon></v-btn>
                <v-list>
                    <v-list-tile @click="removebar = !removebar" ripple>
                        <v-list-tile-action>
                            <v-icon error class="error--text">remove_circle</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ __('Remove') }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="hidebar = !hidebar" ripple>
                        <v-list-tile-action>
                            <v-icon class="grey--text">@{{ hidebar ? 'visibility' : 'visibility_off' }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ hidebar ? 'Show' : 'Hide' }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-slide-y-transition>
            <v-card-text v-show="!hidebar">
                <v-card dark flat class="transparent text-xs-center">
                    <v-card-text class="pt-0 pb-5 pink--text text--darken-1a">
                        <div class="body-2">Search engine visits,
                            <span class="caption pink--text text--lighten-1"><em>40%</em></span>
                        </div>
                    </v-card-text>
                </v-card>
                <div class="mini-chart-container">
                    <canvas id="bar"></canvas>
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
                    hidebar: false,
                    removebar: false,
                }
            }
        })
    </script>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('bar').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 100);
        gradient.addColorStop(0.25, 'rgba(236, 64, 122, .9)');
        gradient.addColorStop(0.5, 'rgba(236, 64, 122, .9)');
        gradient.addColorStop(1, 'rgba(236, 64, 122, .9)');

        Chart.defaults.global.defaultFontColor = '#fff';
        var chart = new Chart(ctx, {
            type: 'bar',

            data: {
                labels: [
                            "Direct traffic visits", //These are visits by people who clicked a bookmark to visit your site or directly entered your URL in their browser. Part of those visitors could be visitors recruited by an offline campaign, such as TV commercial.
                            "Referring site visits", //These are visits by people who reached your website by clicking a link in another site.
                            "Mail",
                            "Search engine visits", //These are visits by people who reached your website through a search engine result page.
                            "Display",
                            "Paid",
                            "Social",
                            "Others", //????? Idk
                        ],
                datasets: [{
                    label: 'Score',
                    data: [10, 20, 30, 40, 29, 18, 40, 9],
                    borderWidth: 2,
                    borderColor: "rgb(236, 64, 122)",
                    backgroundColor: gradient,
                    hoverBackgroundColor: "rgba(236, 64, 122, 1)",
                    hoverBorderColor: "rgba(236, 64, 122, 0.8)",
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
