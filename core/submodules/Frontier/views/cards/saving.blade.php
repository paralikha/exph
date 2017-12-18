<v-card class="mb-3 elevation-1">
    <v-toolbar card class="transparent">

        @stack("cards.saving.pre-title")

        <v-toolbar-title class="accent--text">{{ __('Saving') }}</v-toolbar-title>

        @stack("cards.saving.post-title")

    </v-toolbar>

    <v-card-text class="grey--text">

        <div class="caption grey--text">{{ __("You are editing as") }} <strong>{{ user()->username }}</strong></div>

        @stack("cards.saving.pre-fields")

        @section("cards.saving.fields")
        {{-- <div class="subheading"><v-icon>email</v-icon> {{ __('Notifications') }}</div>
        <div>
            <v-checkbox
                color="primary"
                label="{!! __('Notify this user upon save') !!}"
                title="{!! __('Notify this user upon save') !!}"
                v-model="resource.notify.model"
                hide-details
            ></v-checkbox>
            <input type="hidden" name="notify" :value="resource.notify.model">
        </div> --}}
        @show

        @stack("cards.saving.post-fields")

    </v-card-text>
    <v-card-actions>
        @stack("cards.saving.pre-actions")

        <v-spacer></v-spacer>
        <v-btn primary type="submit" class="elevation-1">{{ _('Save') }}</v-btn>

        @stack("cards.saving.post-actions")

    </v-card-actions>
</v-card>
