<v-card class="mb-3 elevation-1">
    <v-toolbar card dense class="transparent">
        <v-icon class="accent--text">perm_media</v-icon>
        <v-toolbar-title class="subheading accent--text">{{ __('Featured Image') }}</v-toolbar-title>
    </v-toolbar>

    <v-mediabox
        :categories="video_bg.categories"
        :dropzone="true"
        :dropzone-options="{url:'{{ route('api.library.upload') }}', autoProcessQueue: true}"
        :dropzone-params="{_token: '{{ csrf_token() }}'}"
        :multiple="false"
        :old="video_bg.old"
        auto-remove-files
        close-on-click
        search="mime:image"
        toolbar-icon="perm_media"
        toolbar-label="{{ __('Featured Image') }}"
        v-model="video_bg.model"
        @selected="value => { video_bg.new = value[0] }"
        @sending="({file, params}) => { params.catalogue_id = video_bg.category.current.id; params.originalname = file.upload.filename}"
    >
        <template slot="media" scope="props">
            <v-card transition="scale-transition" class="white" :class="props.item.active?'elevation-10':'elevation-1'">
                <v-toolbar dense card class="transparent">
                    <v-toolbar-title class="subheading" v-html="props.item.originalname"></v-toolbar-title>
                </v-toolbar>
                <v-card-media height="250px" :src="props.item.thumbnail">
                    <v-container fill-height class="pa-0 white--text">
                        <v-layout fill-height wrap column>
                            <v-spacer></v-spacer>
                            <v-slide-y-transition>
                                <v-icon ripple class="display-4 pa-1 text-xs-center primary--text text-elevation-10" v-show="props.item.active">check</v-icon>
                            </v-slide-y-transition>
                            <v-spacer></v-spacer>
                        </v-layout>
                    </v-container>
                </v-card-media>
                <v-card-actions class="grey--text">
                    <v-icon class="grey--text" v-html="props.item.icon"></v-icon>
                    <v-spacer></v-spacer>
                    <span v-html="props.item.mime"></span>
                    <span v-html="props.item.filesize"></span>
                </v-card-actions>
            </v-card>
        </template>
    </v-mediabox>

    <v-card-text v-if="!video_bg.new" class="text-xs-center">
        <v-fade-transition>
            <div v-show="!video_bg.new" class="my-2">
                <v-icon x-large class="grey--text text--lighten-2">perm_media</v-icon>
                <p class="ma-0 caption grey--text text--lighten-2">{{ __('No Image') }}</p>
            </div>
        </v-fade-transition>
    </v-card-text>

    <div v-else>
        <img
            width="100%"
            :src="video_bg.new ? video_bg.new.thumbnail : ''"
            role="button"
            @click.stop="video_bg.model = !video_bg.model"
        >
    </div>
    <input type="hidden" name="video_bg" :value="JSON.stringify([video_bg.new])">
    <input type="hidden" name="feature" :value="video_bg.new ? video_bg.new.thumbnail : ''">
    <v-card-actions>
        <v-btn v-if="video_bg.new" flat @click.stop="video_bg.new = null">{{ __('Remove') }}</v-btn>
        <v-spacer></v-spacer>
        <v-btn flat @click.stop="video_bg.model = !video_bg.model"><span v-html="video_bg.new ? '{{ __('Change') }}' : '{{ __('Browse') }}'"></span></v-btn>
    </v-card-actions>
</v-card>

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-mediabox/dist/vuetify-mediabox.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script src="{{ assets('frontier/vuetify-mediabox/dist/vuetify-mediabox.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    video_bg: {
                        categories: {!! json_encode($catalogues) !!},
                        current: null,
                        new: null,
                        old: [],
                        category: {
                            current: {},
                        },
                        model: false,
                    }
                }
            },

            mounted () {
                this.video_bg.categories = {!! json_encode($catalogues) !!};
                this.video_bg.old = '{!! old('video_bg') !!}' ? JSON.parse('{!! old('video_bg') !!}') : [{thumbnail: '{{ settings('video_bg') }}'}];
            },
        })
    </script>
@endpush
