@extends("Theme::layouts.public")

@section("content")

    <span>Cart count: {{ $cart->count() }}</span>

    <p>
        <form action="{{ route('cart.add') }}" method="POST">
            {{ csrf_field() }}
            <img src="http://source.unsplash.com/80x80?beach" alt="">
            <input type="text" name="id" value="1">
            <input type="text" name="price" value="1">
            <input type="text" name="name" value="Beach Lotion Product">
            <input type="number" name="quantity" value="1">
            <v-btn type="submit" class="primary white--text">{{ __('Add') }}</v-btn>
        </form>
    </p>
@endsection
