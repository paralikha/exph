{{-- pick a schedule --}}
<v-dialog v-model="dialog.dates" width="500px" style="overflow-y: auto !important;" class="mt-4">
    <v-btn primary large round class="elevation-1 px-4" dark slot="activator">Pick a schedule</v-btn>
    <v-card class="elevation-1">
        <v-toolbar class="elevation-0 transparent">
            <v-toolbar-title>{{ __('When do you want to go?') }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon @click.native="dialog.dates = false">
                <v-icon>close</v-icon>
            </v-btn>
        </v-toolbar>
        <v-divider></v-divider>
        <v-list two-line subheader>
            @foreach ($resource->availabilities_list as $month => $availabilities)
                <v-subheader>{{ $month }}</v-subheader>
                @foreach ($availabilities as $availability)
                    <v-list-tile>
                        <v-list-tile-content>
                            <v-list-tile-title>{{ $availability->date }}</v-list-tile-title>
                            <v-list-tile-sub-title>{{ $availability->time }}, {{ $availability->days }}</v-list-tile-sub-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-btn ripple outline primary href="{{ route('experiences.details', $resource->code) }}?availability_id={{ $availability->id }}">
                                {{ __('Choose') }}
                            </v-btn>
                        </v-list-tile-action>
                    </v-list-tile>
                @endforeach
            @endforeach
        </v-list>
    </v-card>
</v-dialog>
{{-- /pick a schedule --}}
