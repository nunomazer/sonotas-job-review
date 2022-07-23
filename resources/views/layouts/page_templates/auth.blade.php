@include('layouts.partials.navbar')
<div class="page-wrapper">
    @include('layouts.partials.header')

    <div class="page-body">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</div>

