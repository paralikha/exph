<header>
    <v-toolbar class="elevation-1 white">
        @include("Public::sections.nav")
    </v-toolbar>
</header>

@push('css')
	<style>
		header {
            position: fixed;
            display: none;
            width: 100%;
            height: 64px;
            z-index: 2;
            top: 0;
            background: transparent;
        }
	</style>
@endpush
