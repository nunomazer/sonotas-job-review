<div class="col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Serviços mais vendidos</h3>
        </div>
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Quantidade</th>
                    <th>Faturamento</th>
                </tr>
                </thead>
                <tbody>
                @foreach($servicosMaisVendidos as $s)
                    <tr>
                        <td>
                            {{ $s->nome }}
                        </td>
                        <td class="text-muted">
                            {{ $s->qtde }}
                        </td>
                        <td class="text-muted">
                            {{ number_format($s->valor, 2, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
