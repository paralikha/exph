<v-card class="elevation-1 mb-3">
    <v-toolbar card class="transparent">
        <v-toolbar-title primary-title class="subheading">{{ __('Map') }}</v-toolbar-title>
        <v-spacer></v-spacer>
    </v-toolbar>
    <v-card-text>
        {{-- <input type="hidden" name="map" :value="resource.item.map"> --}}

        <v-text-field textarea name="map_instructions" v-model="resource.item.map_instructions" label="{{ __('Meet up place instruction') }}" hint="{{ __('Add instruction') }}" persistent-hint></v-text-field>

        <v-text-field prepend-icon="map" name="map" v-model="resource.item.map" label="{{ __('Map') }}" hint="{{ __('Add a Google Maps embed code') }}" persistent-hint></v-text-field>

        <div v-html="resource.item.map"></div>

    </v-card-text>
</v-card>
