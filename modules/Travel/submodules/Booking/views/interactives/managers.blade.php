<v-card class="elevation-1 mb-3">
    <v-toolbar card class="transparent">
        <v-toolbar-title primary-title class="subheading">{{ __('Travel Manager') }}</v-toolbar-title>
        <v-spacer></v-spacer>
    </v-toolbar>
    <v-card-text>
        <input type="hidden" name="user" :value="resource.item.user">
        <v-select
            :error-messages="errors.user"
            :items="resource.managers.items"
            item-value="id"
            item-text="displayname"
            v-model="resource.item.user"
            label="{{ __('Travel Manager') }}"
            search-input
        >
            <template slot="item" scope="data">
                <v-list-tile>
                    <v-list-tile-avatar>
                        <img :src="data.item.avatar">
                    </v-list-tile-avatar>
                    <v-list-tile-title>
                        <span v-html="`${data.item.displayname}`"></span>
                    </v-list-tile-title>
                </v-list-tile>
            </template>
        </v-select>
    </v-card-text>
</v-card>
