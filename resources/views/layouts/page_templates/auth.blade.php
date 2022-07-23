@include('layouts.partials.navbar')
<div class="page-wrapper">
    @include('layouts.partials.header')

    <div class="page-body">
        <div class="container-xl">
            @yield('content')
        </div>
    </div>

    @include('layouts.partials.footer')
</div>

