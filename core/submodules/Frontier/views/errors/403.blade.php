@extends("Theme::layouts.admin")

@section("head-title", '403 Error')
@section("head-subtitle", 'Forbidden')

@section("content")
    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex sm6 offset-sm3 class="text-xs-center">
                <h1 class="warning--text display-5 mt-5 mb-0"><strong>{{ __('403') }}</strong></h1>
                <h2 class="warning--text display-2 mt-0 lh-1">{{ __('Forbidden') }}</h2>
                <p class="subheading grey--text">{{ __('The action previously taken or this part of the application is restricted.') }}</p>

                @if (user() && user()->isRoot())
                    <pre>
                        @php
                            echo "<pre>";
                                var_dump( $error );
                            echo "</pre>";
                        @endphp
                    </pre>
                @endif
            </v-flex>
        </v-layout>
    </v-container>
@endsection
