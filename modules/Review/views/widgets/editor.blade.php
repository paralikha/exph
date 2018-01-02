{{-- Editor --}}
<v-quill class="elevation-0" :options="{placeholder: '{{ __('Write something...') }}'}" v-model="resource.quill" class="mb-3 card--flat white elevation-1">
    <template>
        <input type="hidden" name="body" :value="resource.quill.html">
        <input type="hidden" name="delta" :value="JSON.stringify(resource.quill.delta)">
    </template>
</v-quill>
{{-- /Editor --}}

@push('css')
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-mediabox/dist/vuetify-mediabox.min.css') }}">
    <link rel="stylesheet" href="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.css') }}">
@endpush

@push('pre-scripts')
    {{-- <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script> --}}
    {{-- <script src="{{ assets('frontier/vuetify-mediabox/dist/vuetify-mediabox.min.js') }}"></script> --}}
    <script src="{{ assets('frontier/vuetify-quill/dist/vuetify-quill.min.js') }}"></script>
    <script>
        // Vue.use(VueResource);
        mixins.push({
            data () {
                return {
                    resource: {
                        quill: {
                            html: '{!! old('body') !!}',
                            delta: JSON.parse({!! json_encode(old('delta')) !!}),
                        }
                    },
                    mediabox: {
                        model: false,
                        fonts: {!! json_encode(config('editor.fonts.enabled', [])) !!},
                        url: '',
                        resource: {
                            thumbnail: '',
                        },
                    },
                }
            },
        })
    </script>
@endpush
