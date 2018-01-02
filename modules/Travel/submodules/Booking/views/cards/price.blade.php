<v-card class="elevation-1 mb-3">
    <v-toolbar flat class="transparent">
        <v-toolbar-title class="subheading">{{ __('Price') }}</v-toolbar-title>
    </v-toolbar>
    <v-card-text>
        <v-text-field
            :error-messages="errors.price"
            label="{{ __('Amount in Peso') }}"
            name="price"
            prefix="{{ settings('site_currency.symbol', '₱') }}"
            type="number"
            v-model="resource.item.price"
        ></v-text-field>
    </v-card-text>
</v-card>
