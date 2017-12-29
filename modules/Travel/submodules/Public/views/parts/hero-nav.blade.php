<div class="hidden-lg-and-up">
    <v-menu
        transition="slide-x-transition"
        bottom
        right
        :nudge-width="200"
        >
        <v-btn icon slot="activator" v-tooltip:bottom="{html:'Menu'}"><v-icon>keyboard_arrow_down</v-icon></v-btn>
        <v-list>
            <v-list-tile ripple href="\experiences">
                <v-list-tile-title>Try An Experience</v-list-tile-title>
            </v-list-tile>
            <v-list-tile ripple href="\roadtrips">
                <v-list-tile-title>Join A Road Trip</v-list-tile-title>
            </v-list-tile>
            <v-list-tile ripple href="\pack-and-go">
                <v-list-tile-title>Book A Surprise</v-list-tile-title>
            </v-list-tile>
            <v-list-tile ripple href="\stories">
                <v-list-tile-title>Stories</v-list-tile-title>
            </v-list-tile>
            <v-list-tile ripple href="\host">
                <v-list-tile-title class="green--text fw-500">Host An Experience</v-list-tile-title>
            </v-list-tile>
            <v-divider></v-divider>
            <v-list-tile ripple href="\my-profile">
                <v-list-tile-action>
                    <v-icon>account_circle</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>My Profile</v-list-tile-title>
            </v-list-tile>
            <v-list-tile ripple href="\notifications">
                <v-list-tile-action>
                    <v-icon>settings</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>Account Settings</v-list-tile-title>
            </v-list-tile>
            <v-list-tile ripple href="\logout">
                <v-list-tile-action>
                    <v-icon>exit_to_app</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>Log out</v-list-tile-title>
            </v-list-tile>
        </v-list>
    </v-menu>
</div>
<v-spacer></v-spacer>
<div class="hidden-md-and-up">
    <v-dialog v-model="dialog.search" fullscreen transition="dialog-bottom-transition" :overlay=false>
        <v-btn icon slot="activator" v-tooltip:bottom="{html: 'Search'}"><v-icon>search</v-icon></v-btn>
        <v-card>
            <v-toolbar dark class="elevation-1">
                <v-btn icon @click.native="dialog.search = false" dark>
                    <v-icon>close</v-icon>
                </v-btn>
                <v-toolbar-title>Settings</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn dark flat @click.native="dialog.search = false">Save</v-btn>
                </v-toolbar-items>
            </v-toolbar>
        </v-card>
    </v-dialog>
</div>

<div class="hidden-md-and-down main-nav">
    {{-- <v-btn href="\experiences" flat>{{ __('Experiences') }}</v-btn>
    <v-btn href="\roadtrips" flat>{{ __('Roadtrips') }}</v-btn>
    <v-btn href="\pack-and-go" flat>{{ __('Pack &amp; Go') }}</v-btn>
    <v-btn href="\stories" flat>{{ __('Stories') }}</v-btn>
    <v-btn href="\host" flat success class="success--text">{{ __('Become a Host') }}</v-btn> --}}
     @include("Theme::recursives.main-menu", ['items' => get_navmenus('main-menu')])
    <v-btn link flat class="success--text text--accent-2" href="{{ route('yolo') }}" v-tooltip:left="{'html':'{{ __('Signup as a Host') }}'}">
        <span>{{ __('Host An Experience') }}</span>
    </v-btn>
    <v-btn link flat class="red--text text--darken-2" href="{{ route('yolo') }}" v-tooltip:left="{'html':'{{ __('Go to a random Experience') }}'}">
        <v-icon left>fa-magic</v-icon>
        <span>{{ __('YOLO!') }}</span>
    </v-btn>

    <v-menu open-on-hover offset-y>
        <v-avatar size="35px" slot="activator" class="mr-4 ml-4 elevation-1">
            <img src="{{ assets('frontier/images/placeholder/woman.jpg') }}" alt="">
        </v-avatar>
        <v-list>
            <v-list-tile ripple href="\my-profile">
                <v-list-tile-action>
                    <v-icon>account_circle</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title> {{ __('My Profile') }} </v-list-title-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
        <v-list>
            <v-list-tile ripple href="\notifications">
                <v-list-tile-action>
                    <v-icon>settings</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title> {{ __('Account Settings') }} </v-list-title-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
        <v-list>
            <v-list-tile ripple href="\logout">
                <v-list-tile-action>
                    <v-icon>exit_to_app</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title> {{ __('Log out') }} </v-list-title-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-menu>
</div>

@push('css')
    <style>
        .main-nav .btn {
            height: 65px !important;
        }
    </style>
@endpush

@push('pre-scripts')
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {
                    dialog: {
                        search: false
                    },
                }
            }
        })
    </script>
@endpush
