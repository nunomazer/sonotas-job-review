<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    @yield('page-pretitle', 'Visão Geral')
                </div>
                <h2 class="page-title">
                    @yield('page-title', 'Dashboard')
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                @include('layouts.partials.dropdown-user')
            </div>
        </div>
    </div>
</div>
