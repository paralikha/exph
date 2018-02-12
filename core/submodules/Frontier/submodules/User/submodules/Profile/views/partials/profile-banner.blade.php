<v-parallax
    height="280"
    src=""
    class="elevation-1 teal">
    <v-layout row wrap align-end justify-bottom>
        <v-flex xs12>
            <v-card dark flat class="transparent">
                <v-card-text>
                    <v-avatar size="120px" class="elevation-3">
                        <img src="{{ $resource->displayavatar }}" alt="{{ $resource->fullname }}" height="120">
                    </v-avatar>
                    <div class="title pt-4">{{ $resource->fullname }}</div>
                    <div class="body-1">{{ $resource->email }}</div>
                    <div class="body-1">{{ $resource->displayrole }}</div>
                </v-card-text>
            </v-card>
        </v-flex>
    </v-layout>
</v-parallax>
