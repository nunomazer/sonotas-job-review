@extends('layouts.app')

@section('page-pretitle', 'OAuth')
@section('page-title', 'Sucesso')

@section('content')
    <div  class="container-tight py-4">
        <div class="card">
            <div class="card-header text-success text-center">
                <h1>Sucesso!</h1>
            </div>
            <div class="card-body text-center">
                <h2>Em breve você será redirecionado para o sistema...</h2>
            </div> 
        </div>
    </div>
@endsection
@push('js')
<script type="text/javascript">
    setTimeout(() => window.location = '{{route("home")}}', 2000);
    </script>
@endpush
