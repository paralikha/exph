<v-card class="elevation-1 mb-3">
    <v-toolbar card class="transparent">
        <v-toolbar-title class="subheading accent--text">{{ __('Available Dates') }}</v-toolbar-title>
        <v-spacer></v-spacer>
    </v-toolbar>

    <v-card-text class="grey lighten-4">
        <div v-if="! resource.dates.items.length">
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-icon class="display-4 grey--text text--lighten-2">date_range</v-icon>
                <v-spacer></v-spacer>
            </v-card-actions>
            <span class="caption red--text" v-if="errors[`availabilities`]" v-html="errors[`availabilities`].join(',')"></span>
        </div>

        <input type="hidden" name="availabilities_obj" :value="JSON.stringify(resource.dates.items)">
        <v-card v-for="(date, i) in resource.dates.items" :key="i" class="elevation-1 mb-2">
            <v-toolbar dense card class="transparent">
                <v-spacer></v-spacer>
                <v-btn icon small ripple @click="remove(resource.dates.items, i)"><v-icon small>close</v-icon></v-btn>
            </v-toolbar>
            <input type="hidden" :name="`availabilities[${i}][id]`" :value="date.id">
            <v-card-text v-if="date.start">
                <v-menu
                    :close-on-content-click="false"
                    full-width
                    lazy
                    max-width="290px"
                    offset-y
                    transition="scale-transition"
                    v-model="date.start.model">
                    <v-text-field
                        slot="activator"
                        :name="`availabilities[${i}][date_start]`"
                        :error-messages="errors[`availabilities.${i}.date_start`]"
                        label="{{ __('Start Date') }}"
                        {{-- v-model="date.start.datetime" --}}
                        :value="`${date.start.date} ${date.start.time}`"
                        hint="{{ __('Format should be YYYY-MM-DD HH:mm(am/pm)') }}"
                        persistent-hint
                    ></v-text-field>
                    <div>
                        <v-date-picker
                            no-title
                            v-model="date.start.date"
                            actions
                            v-if="date.start.date_model"
                            @change="val => {date.start.datetime='asd'}"
                        >
                            <template scope="{save, cancel}">
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                    <v-btn flat color="primary" @click="date.start.date_model = !date.start.date_model"><v-icon>access_time</v-icon></v-btn>
                                </v-card-actions>
                            </template>
                        </v-date-picker>
                        <v-time-picker
                            v-else
                            v-model="date.start.time"
                            actions
                        >
                            <template scope="{save, cancel}">
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                    <v-btn flat color="primary" @click="save">{{ __('OK') }}</v-btn>
                                </v-card-actions>
                            </template>
                        </v-time-picker>
                        {{-- <input type="hidden" name="vue_date_start" :value="resource.date_start">
                        <input type="hidden" name="vue_time_start" :value="resource.time_start"> --}}
                    </div>
                </v-menu>

                <v-menu
                    :close-on-content-click="false"
                    full-width
                    lazy
                    max-width="290px"
                    offset-y
                    transition="scale-transition"
                    v-model="date.end.model">
                    <v-text-field
                        slot="activator"
                        :name="`availabilities[${i}][date_end]`"
                        :error-messages="errors[`availabilities.${i}.date_end`]"
                        label="{{ __('End Date') }}"
                        {{-- v-model="date.end.datetime" --}}
                        :value="`${date.end.date} ${date.end.time}`"
                        hint="{{ __('Format should be YYYY-MM-DD HH:mm(am/pm)') }}"
                        persistent-hint
                    ></v-text-field>
                    <div>
                        <v-date-picker
                            no-title
                            v-model="date.end.date"
                            actions
                            v-if="date.end.date_model"
                        >
                            <template scope="{save, cancel}">
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                    <v-btn flat color="primary" @click="date.end.date_model = !date.end.date_model"><v-icon>access_time</v-icon></v-btn>
                                </v-card-actions>
                            </template>
                        </v-date-picker>
                        <v-time-picker
                            v-else
                            v-model="date.end.time"
                            actions
                        >
                            <template scope="{save, cancel}">
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn flat color="primary" @click="cancel">{{ __('Cancel') }}</v-btn>
                                    <v-btn flat color="primary" @click="save">{{ __('OK') }}</v-btn>
                                </v-card-actions>
                            </template>
                        </v-time-picker>
                        {{-- <input type="hidden" name="vue_date_end" :value="resource.date_end">
                        <input type="hidden" name="vue_time_end" :value="resource.time_end"> --}}
                    </div>
                </v-menu>
            </v-card-text>
        </v-card>
    </v-card-text>

    <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn flat @click="add(resource.dates.items, {
            id: null,
            start: {
                model: false,
                obj_date: null,
                date_model: true,
                date: '',
                datetime: '',
                time: '',
                time_model: false,
                obj_time: null,
            },
            end: {
                model: false,
                obj_date: null,
                date_model: true,
                date: '',
                datetime: '',
                time: '',
                time_model: false,
                obj_time: null,
            },
        })">{{ __('Add Date') }}</v-btn>
    </v-card-actions>
</v-card>
