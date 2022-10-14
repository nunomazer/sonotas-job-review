@extends('layouts.app')

@section('content')
    {{$dataTable->table()}}
@endsection

@push('js')
    {{$dataTable->scripts()}}
@endpush