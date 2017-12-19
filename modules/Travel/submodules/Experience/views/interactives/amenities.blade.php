<v-card flat class="mb-3">
    <v-divider></v-divider>
    <v-toolbar card class="transparent">
        <v-toolbar-title primary-title class="subheading">{{ __('Package Inclusions') }}</v-toolbar-title>
        <v-spacer></v-spacer>
    </v-toolbar>
    <v-card-text>
        <input type="hidden" name="amenities[]" v-for="(amenity, i) in resource.item.amenities" :value="amenity.id">
        <input type="hidden" name="amenities_obj" :value="JSON.stringify(resource.item.amenities)">
        <v-list>
            <v-list-tile :key="i" v-for="(amenity, i) in resource.item.amenities">
                <v-list-tile-avatar>
                    <v-icon v-html="amenity.icon"></v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content>
                    <v-list-tile-title v-html="amenity.name"></v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action>
                    <v-btn icon @click="remove(resource.item.amenities, i)"><v-icon>close</v-icon></v-btn>
                </v-list-tile-action>
            </v-list-tile>
        </v-list>
        <v-card class="elevation-1" v-if="addform.model">
            <v-card-actions>
                {{-- List --}}
                <v-select
                    :error-messages="errors.user"
                    :items="resource.amenities.items"
                    return-object
                    item-text="name"
                    v-model="resource.amenities.current"
                    label="{{ __('Select Amenity') }}"
                    search-input
                >
                    <template slot="item" scope="data">
                        <v-list-tile>
                            <v-list-tile-avatar>
                                <v-icon v-html="data.item.icon"></v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-title>
                                <span v-html="`${data.item.name}`"></span>
                            </v-list-tile-title>
                        </v-list-tile>
                    </template>
                </v-select>
                <v-btn v-tooltip:bottom="{html: '{{ __('Confirm') }}'}" class="elevation-1 accent success--text" @click="resource.item.amenities.push(resource.amenities.current); addform.model = !addform.model">{{ __('Add') }}</v-btn>
            </v-card-actions>
        </v-card>
    </v-card-text>
    <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn flat @click="addform.model = !addform.model"><v-icon left>add</v-icon>{{ __('Add Amenity') }}</v-btn>
    </v-card-actions>
</v-card>
