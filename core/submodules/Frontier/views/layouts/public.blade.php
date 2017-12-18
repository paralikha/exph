@extends("Theme::layouts.master")

@section("pre-container", "")
@section("post-container", "")

@section("root")
    @yield("main-menu")
    @yield("content")
@endsection
