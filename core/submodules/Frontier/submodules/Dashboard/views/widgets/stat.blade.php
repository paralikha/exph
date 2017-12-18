<v-card class="elevation-1 m-0 p-0 transparent">
    <v-card-media src="{{ assets('frontier/images/placeholder/sql.jpg') }}">
        <div class="insert-overlay" style="background: rgba(1, 18, 27, 0.88); position: absolute; width: 100%; height: 100%;"></div>
        <v-toolbar class="transparent elevation-0">
            <v-menu
                transition="slide-y-transition"
                bottom
                dark
                >
                <v-btn round  slot="activator" flat class="white--text">
                    Monthly <v-icon class="white--text">arrow_drop_down</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile v-for="item in year" :key="item.title" @click="">
                        <v-list-tile-title>@{{ item.title }}</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <v-spacer></v-spacer>
            <v-btn icon v-tooltip:left="{html: 'Download'}" dark class="mr-4">
                <v-icon>file_download</v-icon>
            </v-btn>
            <v-btn dark icon @click.native="hidden = !hidden" v-tooltip:left="{ 'html':  hidden ? 'Show Analytics' : 'Hide Analytics' }">
                <v-icon>@{{ hidden ? 'visibility' : 'visibility_off' }}</v-icon>
            </v-btn>
        </v-toolbar>
        {{-- <v-slide-y-transition> --}}
            <v-card class="elevation-0 transparent" v-show="!hidden" transition="slide-y-transition">
                <v-card-text>
                    <v-layout row wrap justify-center align-center>
                        <v-flex sm8 xs12>
                            <div class="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>
                        </v-flex>
                        <v-flex sm4 xs12>
                            <v-layout row wrap class="media">
                                <v-flex xs6>
                                    <v-layout row wrap class="media">
                                        <v-card-text class="white--text text-xs-center">
                                            <div class="headline"><v-icon dark class="success--text">arrow_drop_up</v-icon>1240</div>
                                            <div class="caption"> Overall Active Users</div>
                                        </v-card-text>
                                    </v-layout>
                                </v-flex>
                                <v-flex xs6>
                                    <v-layout row wrap class="media">
                                        <v-card-text class="white--text text-xs-center">
                                            <div class="headline"><v-icon dark class="error--text">arrow_drop_down</v-icon>1030</div>
                                            <div class="caption"> Overall Inactive Users</div>
                                        </v-card-text>
                                    </v-layout>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap class="text-xs-center">
                                <v-flex xs6>
                                    <v-progress-circular
                                        v-bind:size="80"
                                        v-bind:width="8"
                                        v-bind:value="male"
                                        class="cyan--text text--lighten-1"
                                        >
                                        @{{ male }}
                                    </v-progress-circular>
                                    <v-layout row wrap class="media">
                                        <v-card-text class="pa-0">
                                            <div class="caption white--text">Male, <em>55%</em></div>
                                        </v-card-text>
                                    </v-layout>
                                </v-flex>
                                <v-flex xs6>
                                    <v-progress-circular
                                        v-bind:size="80"
                                        v-bind:width="8"
                                        v-bind:value="female"
                                        class="cyan--text text--lighten-1"
                                        >
                                        @{{ female }}
                                    </v-progress-circular>
                                    <v-layout row wrap class="media">
                                        <v-card-text class="pa-0">
                                            <div class="caption white--text">Female, <em>45%</em></div>
                                        </v-card-text>
                                    </v-layout>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-card-text>
                <v-card-text class="pa-2 white">
                    <v-layout wrap justify-space-around align-center>
                        <v-list class="text-xs-center">
                            <div class="title cyan--text text--darken-2">103</div>
                            <div class="mt-2 caption">New Students</div>
                        </v-list>
                        <v-list class="text-xs-center">
                            <div class="title cyan--text text--darken-2">2270</div>
                            <div class="mt-2 caption">Overall Students</div>
                        </v-list>
                        <v-list class="text-xs-center">
                            <div class="title cyan--text text--darken-2">124</div>
                            <div class="mt-2 caption">New Courses</div>
                        </v-list>
                        <v-list class="text-xs-center">
                            <div class="title cyan--text text--darken-2">566</div>
                            <div class="mt-2 caption">Overall Courses</div>
                        </v-list>
                    </v-layout>
                </v-card-text>
            </v-card>
        {{-- </v-slide-y-transition> --}}
    </v-card-media>
</v-card>

@push('css')
    <style>
        .media {
            z-index: 1;
        }
        .media .card__text {
            z-index: 1
        }
        .alert {
            border-width: 0 !important;
        }
        .chart-container {
            position: relative;
            margin: auto;
            height: 200px;
            width: 100%;
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
                    hidden: false,
                    year: [
                        { title: 'Quarterly' },
                        { title: 'Monthly' },
                        { title: 'Yearly' }
                    ],
                    interval: {},
                    male: 55,
                    female: 45,
                }
            },
            beforeDestroy () {
                clearInterval(this.interval)
            },
        })
    </script>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script>

        var ctx = document.getElementById('myChart').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 200);

        gradient.addColorStop(0.25, 'rgba(0, 188,212, 0.9)');
        gradient.addColorStop(0.5, 'rgba(0, 188,212, 0.7)');
        gradient.addColorStop(1, 'rgba(0, 188,212, 0.2)');

        Chart.defaults.global.defaultFontColor = '#fff';
        var mixedChart = new Chart(ctx, {
            type: 'bar',

            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    type: 'line',
                    label: 'Total Inactive Users',
                    data: [60, 62, 17, 76, 44, 59, 56, 59, 32, 56, 47, 10],
                    borderColor: "#e91e63",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(63, 81, 181, 0.4)",
                    hoverBorderColor: "rgba(63, 81, 181 ,1)",
                },
                {
                    label: "Total Active Users",
                    data: [65, 59, 20, 81, 56, 55, 65, 59, 20, 61, 56, 15],
                    backgroundColor: gradient,
                    borderColor: "#00bcd4",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(0, 188,212 ,0.8)",
                    hoverBorderColor: "rgba(0, 188,212 ,1)",
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            display: false,
                            color: "rgba(255,255,255,0.2)"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });
    </script>
@endpush
