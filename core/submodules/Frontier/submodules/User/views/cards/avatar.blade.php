<v-card class="elevation-1 mb-3" role="button" @click="$refs.avatarFile.click()">
    <v-toolbar dense card class="transparent">
        <v-toolbar-title class="caption">{{ __('Upload Avatar') }}</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon ripple @click.stop="clearPreview"><v-icon>close</v-icon></v-btn>
    </v-toolbar>
    <v-avatar tile size="100%">
        <img v-if="resource.item.avatar" :src="resource.item.avatar" role="button">
        <div v-else class="pa-5 grey--text text-xs-center caption">
            {{ __('Upload avatar') }}
        </div>
        <input ref="avatarFile" name="avatar" type="file" class="hidden-sm-and-up" accept=".png,.jpg,image/jpeg,image/png,image/gif" @change="loadFile">
    </v-avatar>
</v-card>
{{-- <v-card class="mb-3 elevation-1">
    <v-toolbar card class="transparent">
        <v-toolbar-title class="accent--text">{{ __('Avatar') }}</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn
            flat
            icon
            active
            @click.native="resource.avatars.model = ''"
        ><v-icon>close</v-icon></v-btn>
    </v-toolbar>
    <v-card-text>
        <template v-if="resource.avatars.model">
            <template>
                <img width="100%" height="auto" :src="resource.avatars.model">
                <input type="hidden" name="avatar" :value="resource.avatars.model">
            </template>
        </template>
        <v-select
            chips
            autocomplete
            label="{{ __('Choose an avatar') }}"
            item-text="name"
            item-value="avatar"
            v-model="resource.avatars.model"
            v-bind:items="resource.avatars.items"
            hide-details
            search-input
        >
            <template slot="selection" scope="data">
                <v-chip
                    @input="data.parent.selectItem(data.item.avatar)"
                    @click.native.stop
                    class="chip--select-multi"
                    :key="data.item.avatar"
                >
                    <v-avatar>
                        <img :src="data.item.avatar">
                    </v-avatar>
                    @{{ data.item.name }}
                </v-chip>
            </template>
            <template slot="item" scope="data">
                <v-list-tile-avatar>
                    <img width="100%" v-bind:src="data.item.avatar"/>
                </v-list-tile-avatar>
                <v-list-tile-title>
                    @{{ data.item.name }}
                </v-list-tile-title>
            </template>
        </v-select>
    </v-card-text>
</v-card> --}}

@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    resource: {
                        item: {
                            avatar: '{{ old('avatar') ? old('avatar') : (isset($resource) ? $resource->avatar : '') }}',
                        },
                        avatars: {
                            model: '{{ old('avatar') ? old('avatar') : (isset($resource) ? $resource->avatar : '') }}',
                            items: {!! json_encode($avatars) !!},
                        },
                    }
                };
            },
            methods: {
                loadFile ($event) {
                    let self = this;
                    let reader = new FileReader();

                    self.files = $event.target.files[0]; //this.$refs.siteLogoFile.file;

                    reader.onloadend = function () {
                        self.resource.item.avatar = reader.result;
                    }

                    if (self.files) {
                        reader.readAsDataURL(self.files);
                    }
                },
                clearPreview () {
                    this.file = null
                    this.resource.item.avatar = null;
                }
            }
        });
    </script>
@endpush
