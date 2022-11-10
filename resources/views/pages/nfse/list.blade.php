@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Notas Fiscais de Serviços')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">

            </div>
        </div>
        <div class="card-body">            
            {{$dataTable->table()}}            
        </div>        
    </div>
    <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalErrorLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalErrorLabel">Erro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Descrição:</label>
                    <textarea class="form-control" id="modalErrorTextarea" readonly style="width: 100%; min-height:100px"></textarea>
                    <sub id="modalErrorDate"></sub>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{$dataTable->scripts()}}
    <script>
        function fillModalError(message, dt){
            //$("#modalError").modal('show');
            $("#modalErrorTextarea").html(message);
            $("#modalErrorDate").html(dt);
        }
    </script>
@endpush