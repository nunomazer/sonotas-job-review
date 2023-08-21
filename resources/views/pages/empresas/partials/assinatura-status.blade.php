@if($empresa->assinatura)
    <span class="mx-1 {{ ($empresa->assinatura->status ?? 99) > 1 ? 'status-red' : 'status-green' }}">
        <span class="status-dot"></span>
    </span>

    @if($empresa->assinatura->status == null)
        <a href="{{ route('empresas.assinatura.edit', [$empresa, $empresa->assinatura]) }}" class="btn btn-sm btn-warning d-block d-md-inline-block">
            Editar {{ $empresa->assinatura->plano->name }}
        </a>
        <br />
        <div class="badge badge-pill">
            {{ (new \App\Services\MoneyFlow\MoneyFlowService())->assinaturaDriver()->getStatusNome($empresa->assinatura) }}
        </div>
    @else
        <div class="badge badge-pill {{ ($empresa->assinatura->status ?? 99) > 1  ? 'badge-warning' : 'badge-success' }}">
            {{ (new \App\Services\MoneyFlow\MoneyFlowService())->assinaturaDriver()->getStatusNome($empresa->assinatura) }}
        </div>
    @endif
@else
    <a href="{{route('empresas.assinatura.create', $empresa)}}" class="btn btn-sm btn-warning d-block d-md-inline-block">
        Assinar plano
    </a>
@endif
