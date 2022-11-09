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
@endsection
@push('js')
    {{$dataTable->scripts()}}
@endpush