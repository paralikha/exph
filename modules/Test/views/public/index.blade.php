@extends("Theme::layouts.public")

@section("content")
    <v-container fluid grid-list-lg>
        @include("Theme::partials.banner")

        <v-layout row wrap>
            <v-flex sm12>
                <p class="headline">Single Page View</p>

                <v-card class="elevation-1">
                    <v-toolbar card>
                        <v-toolbar-title>{{ __('Sample Product') }}</v-toolbar-title>
                    </v-toolbar>
                    <v-card-text>
                        <p>Some Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil minus sequi neque adipisci, eos autem odio delectus inventore quo, blanditiis sed nemo illum quos non natus iusto enim reiciendis qui.</p>
                        <strong>price:</strong> PHP 10.00
                    </v-card-text>
                    <v-card-actions>
                        <form action="{{ route('cart.add') }}" method="POST">
                            {{ csrf_field() }}
                            <p>Required fields: make this fields `type=hidden`</p>
                            <v-text-field type="text" readonly label="id" name="id" value="1"></v-text-field>
                            <v-text-field type="text" readonly label="name" name="name" value="Sample Product"></v-text-field>
                            <v-text-field type="text" readonly label="price" name="price" value="10.00"></v-text-field>
                            <v-text-field type="text" readonly label="quantity" name="quantity" value="1"></v-text-field>
                            <p>Optional fields</p>
                            <v-text-field type="text" readonly label="code" name="code" value="sample-product"></v-text-field>

                            <v-btn type="submit" class="orange white--text">Book Now</v-btn>
                        </form>
                    </v-card-actions>
                </v-card>

            </v-flex>
        </v-layout>
    </v-container>

@endsection
