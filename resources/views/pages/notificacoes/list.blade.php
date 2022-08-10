@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Notificações')

@section('content')
    <div class="card">
        <div class="card-header">

            <div class="card-actions">

            </div>
        </div>
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Data</th>
                        <th>Contexto</th>
                        <th class="table-sort" data-sort="sort-name">Mensagem</th>
                        <th class="table-sort" data-sort="sort-name">Detalhes</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach(auth()->user()->notifications()->paginate(20) as $notification)
                            <tr class="{{$notification->read_at ? '' : 'fw-bold'}}">
                                <td>
                                    <span class="status-{{($notification->data['status'] ?? false) == 'error' ? 'red' : 'lime'}}">
                                        <span class="status-dot"></span>
                                    </span>
                                </td>
                                <td>
                                    {{ $notification->created_at->format('d/m/Y H:i:s') }}
                                </td>
                                <td>
                                    {{ \Illuminate\Support\Str::after($notification->type, 'Notifications\\') }}
                                </td>
                                <td>
                                    {{ $notification->data['mensagem'] ?? '' }}
                                </td>
                                <td class="small">
                                    @foreach($notification->data as $key => $value)
                                        @if( ! in_array($key, ['mensagem', 'status', 'empresa_id']) )
                                            <span class="fw-lighter">{{$key}}:</span> {{ is_array($value) ? '' : $value }} <br/>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if ($notification->read_at == null)
                                        <a href="{{ route('notificacoes.marcar-como-lida', $notification->id) }}" class="btn btn-sm" data-toggle="tooltip" data-title="Marcar como lida">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{auth()->user()->notifications()->paginate(20)->links()}}
        </div>
    </div>
@endsection
