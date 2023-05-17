@include('layouts.partials.navbar')
<div class="page-wrapper">
    @include('layouts.partials.header')

    <div class="page-body">
        <div class="container-xl">
            @include('layouts.partials.messages')

            @if($assinaturasAtivas->count() == 0)
                <div class="alert alert-danger">
                    <strong>Atenção</strong>:
                    Nenhuma empresa cadastrada possui assinatura de plano mensal ativa. Acesse a área de empresas
                    e cadastre um plano para poder emitir os documentos fiscais!
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @include('layouts.partials.footer')
</div>
