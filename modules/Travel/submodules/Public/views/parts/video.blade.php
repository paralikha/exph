<section id="video">
    <v-layout row wrap>
        <v-flex xs12>
            <v-layout row wrap align-center>
                <v-flex xs12>
                    <v-parallax class="mb-4 mt-5" height="450" src="{{ assets('frontier/images/public/v1.jpg') }}">
                        <v-layout
                            column
                            align-center
                            justify-center
                            class="white--text"
                            >
                            <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%; top: 0;"></div>
                            <v-card dark class="elevation-0 transparent text-xs-center">
                                <v-card-text>
                                    <h3 class="uppercase"><strong>{!! settings('video_title') !!}</strong></h3>
                                    <h6 class="fw-400">{!! settings('video_subtitle') !!}</h6>
                                    {{-- <a class="td-n" target="_blank" href="{!! settings('video_link') !!}">
                                        <v-avatar v-tooltip:bottom="{ html: 'Click to watch the video' }">
                                            <v-icon class="display-3 white--text">play_circle_filled</v-icon>
                                        </v-avatar>
                                    </a> --}}
                                    <v-dialog v-model="resource.dialog.model" persistent max-width="290">
                                        <v-btn color="primary" dark slot="activator">Open Dialog</v-btn>
                                        <v-card>
                                            <v-card-title class="headline">Use Google's location service?</v-card-title>
                                            <v-card-text>Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.</v-card-text>
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="green darken-1" flat @click.native="resource.dialog.model=false">Disagree</v-btn>
                                                <v-btn color="green darken-1" flat @click.native="resource.dialog.model=false">Agree</v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </v-card-text>
                            </v-card>
                        </v-layout>
                    </v-parallax>
                </v-flex>
            </v-layout>
        </v-flex>
    </v-layout>
</section>

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    resource: {
                        dialog: {
                            model: false,
                        }
                    }
                };
            },

            // mounted () {
            //     this.get();
            //     // console.log("dataset.pagination", this.dataset.pagination);
            // },
        });
    </script>
@endpush
