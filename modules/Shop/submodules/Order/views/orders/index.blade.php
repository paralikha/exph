@extends("Theme::layouts.admin")

@section("content")

    <v-container fluid grid-list-lg>
        <v-layout row wrap>
            <v-flex sm12>

                <v-card class="elevation-1">
                    <table class="table">
                        <thead>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Reference Number') }}</th>
                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Purchase Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($resources as $resource)
                                <tr>
                                    <td>{{ $resource->id }}</td>
                                    <td>{{ @$resource->experience()->withoutGlobalScopes()->first()->refnum }}</td>
                                    <td>{{ $resource->customer->fullname }}</td>
                                    <td>{{ $resource->total }}</td>
                                    <td>{{ $resource->purchased }}</td>
                                    <td>{{ 'asd' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </v-card>

            </v-flex>
        </v-layout>
    </v-container>

@endsection
