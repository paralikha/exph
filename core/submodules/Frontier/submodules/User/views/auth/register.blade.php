@extends("Theme::layouts.auth")

@section("content")
    <main>
        <v-container fluid fill-height>
            <v-layout row wrap align-center>
                <v-flex xs12>
                    <v-layout row wrap justify-center align-center>
                        <v-flex lg6 md10 sm10 xs12>
                            <v-card class="elevation-1">
                                <v-layout row wrap>
                                    <v-flex md5 xs12 class="primary hidden-sm-and-down">
                                            <v-layout row wrap justify-center align-center>
                                                <v-flex xs12>
                                                    <v-card class="elevation-0 transparent white--text" height="100%">
                                                        <v-card-text class="text-xs-center">
                                                            <v-layout row wrap justify-center align-center>
                                                                <v-flex xs12>
                                                                    {{-- <p><img src="{{ assets('frontier/images/placeholder/registration_bg.svg') }}" alt="" width="150"></p> --}}
                                                                    <p>
                                                                        <img src="{{ assets('frontier/images/public/footer.png') }}" alt="">
                                                                    </p>
                                                                    {{-- <h4>{{ $application->page->title }}</h4> --}}
                                                                    <h4>Welcome, brave traveler!</h4>
                                                                    <p>Remember, life is a journey. You are an explorer of the world. Be open to new culture, new experience, new people. Embrace spontaneity and appreciate life's little surprises. Rise up. Be yourself. Live awesome. Be curious and let's go travel differently.</p>
                                                                </v-flex>
                                                            </v-layout>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-flex>
                                            </v-layout>
                                    </v-flex>
                                    <v-flex md5 xs12 class="primary hidden-md-and-up">
                                            <v-layout row wrap justify-center align-center>
                                                <v-flex sm3 xs12>
                                                    <v-card-text class="px-4 pt-4">
                                                        <img src="{{ assets('frontier/images/placeholder/registration_bg.svg') }}" alt="{{ $application->page->title }}" width="100%" style="max-width: 150px;">
                                                    </v-card-text>
                                                </v-flex>
                                                <v-flex sm9 xs12>
                                                    <v-card class="elevation-0 transparent white--text" height="100%">
                                                        <v-card-text>
                                                            <h4>{{ $application->page->title }}</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut praesentium eveniet, explicabo nobis id dolore earum</p>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-flex>
                                            </v-layout>
                                    </v-flex>
                                    <v-flex md7 xs12>
                                        @include("Theme::partials.banner")
                                        <v-card class="elevation-0" transition="slide-x-transition" height="100%">
                                            <v-toolbar card class="white text-xs-center" prominent>
                                                <v-spacer v-if="settings && settings.logo_is_centered"></v-spacer>
                                                    <img class="brand-logo" width="40" class="mt-2" avatar src="{{ $application->site->logo }}" alt="{{ $application->site->title }}"/>
                                                <v-toolbar-title class="brand-type accent--text">
                                                {{ $application->site->title }} <span class="grey--text">  | {{ $application->page->title }}</span>
                                                </v-toolbar-title>
                                                <v-spacer></v-spacer>
                                            </v-toolbar>
                                            <v-divider></v-divider>
                                            <v-card-text class="px-4">
                                                <form method="POST" action="{{ route('register.register') }}">
                                                    {{ csrf_field() }}
                                                    <v-text-field
                                                        :error-messages="resource.errors.firstname"
                                                        class="input-group mb-3"
                                                        label="First Name"
                                                        name="firstname"
                                                        hide-details
                                                        value="{{ old('firstname') }}"
                                                    ></v-text-field>
                                                    <v-text-field
                                                        :error-messages="resource.errors.lastname"
                                                        class="input-group mb-3"
                                                        label="Last Name"
                                                        name="lastname"
                                                        hide-details
                                                        value="{{ old('lastname') }}"
                                                    ></v-text-field>
                                                    <v-text-field
                                                        :error-messages="resource.errors.email"
                                                        class="input-group mb-3"
                                                        label="Email"
                                                        name="email"
                                                        type="email"
                                                        hide-details
                                                        value="{{ old('email') }}"
                                                    ></v-text-field>
                                                    <v-text-field
                                                        :append-icon-cb="() => (resource.visible = !resource.visible)"
                                                        :append-icon="resource.visible ? 'visibility' : 'visibility_off'"
                                                        :error-messages="resource.errors.password"
                                                        :type="resource.visible ? 'text': 'password'"
                                                        class="input-group mb-3"
                                                        label="Password"
                                                        hide-details
                                                        min="6"
                                                        name="password"
                                                        value="{{ old('password') }}"
                                                    ></v-text-field>
                                                    <v-text-field
                                                        :error-messages="resource.errors.password_confirmation"
                                                        :type="resource.visible ? 'text': 'password'"
                                                        class="input-group mb-3"
                                                        label="Confirm Password"
                                                        hide-details
                                                        min="6"
                                                        name="password_confirmation"
                                                        value="{{ old('password_confirmation') }}"
                                                    ></v-text-field>

                                                    <v-checkbox
                                                        :error-messages="resource.errors.terms_and_conditions"
                                                        :checked="resource.terms_and_conditions"
                                                        label="{{ __('Agree to our Terms and Conditions') }}"
                                                        light
                                                        color="primary"
                                                        hide-details
                                                        v-model="resource.terms_and_conditions"
                                                        @click="() => {resource.terms_and_conditions = !resource.terms_and_conditions}"
                                                    >
                                                    </v-checkbox>
                                                    <div class="mb-3">
                                                        <input v-if="resource.terms_and_conditions" type="hidden" name="terms_and_conditions" :value="resource.terms_and_conditions">
                                                   </div>

                                                    <div class="text-xs-left mb-3">
                                                        <v-btn large primary dark class="mb-5 ml-0 elevation-1" type="submit">{{ __("Register") }}</v-btn>
                                                        <div><a target="_blank" role="button" href="{{ route('public.show', 'terms-and-conditions') }}" class="grey--text">{{ __('Terms and Conditions') }}</a></div>
                                                    <div><a class="grey--text" role="button" href="{{ route('login.show') }}">{{ __('Have an Account? Login here.') }}</a></div>
                                                    </div>
                                                </form>

                                                {{-- Template --}}
                                                {{-- <template inline-template>
                                                    <div class="hr">
                                                        <strong class="hr-text grey--text text--lighten-2">or</strong>
                                                    </div>
                                                    <v-layout>
                                                        <v-flex md6 class="text-xs-center">
                                                            <v-btn block class="grey--text elevation-0">
                                                                <i class="fa fa-google">&nbsp;</i>
                                                                Google
                                                            </v-btn>
                                                        </v-flex>
                                                        <v-flex md6 class="text-xs-center">
                                                            <v-spacer></v-spacer>
                                                            <v-btn block class="grey--text elevation-0">
                                                                <i class="fa fa-facebook">&nbsp;</i>
                                                                Facebook
                                                            </v-btn>
                                                        </v-flex>
                                                    </v-layout>
                                                </template> --}}
                                                {{-- /Template --}}
                                            </v-card-text>
                                        </v-card>
                                        @stack('post-login')
                                    </v-flex>
                                </v-layout>
                            </v-card>
                            <v-card-actions class="px-0">
                                <v-spacer></v-spacer>
                                <small class="grey--text text--darken-1">{{ __($application->site->copyright) }}</small>
                            </v-card-actions>
                        </v-flex>
                    </v-layout>
                </v-flex>
            </v-layout>
        </v-container>
    </main>
@endsection

@push('post-css')
    <style>
        /*.card--flex-toolbar--stylized {
            margin-top: -65px;
        }*/
        .hr{text-align:center;position:relative}.hr:after,.hr:before{content:"";display:block;width:40%;height:1px;margin:2px 1rem;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);background-color:rgba(0,0,0,.15)}.hr:after{text-align:left;position:absolute;left:0}.hr:before{position:absolute;text-align:right;right:0}[class*=application-] .color--google:hover{background-color:#db3236;color:#fff}[class*=application-] .color--facebook:hover{background-color:#3a589e;color:#fff}
        /*# sourceMappingURL=login.css.map*/
    </style>
@endpush

@push('pre-scripts')
    <script>
        mixins.push({
            data () {
                return {
                    settings: {},
                    resource: {
                        errors: JSON.parse('{!! json_encode($errors->getMessages()) !!}'),
                        item: [],
                        model: false,
                        terms_and_conditions: ('{{ old('terms_and_conditions') }}' ==  null) ? false : '{{ old('terms_and_conditions') }}',
                        visible: false,
                    }
                };
            },
        });
    </script>
@endpush
