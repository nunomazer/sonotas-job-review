@extends('layouts.app', [
    'class' => 'border-top-wide border-primary d-flex flex-column',
])

@section('content')
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-img"><img src="./static/illustrations/undraw_quitting_time_dm8t.svg" height="128"
                        alt="">
                </div>
                <p class="empty-title">Temporariamente parado para manutenção</p>
                <p class="empty-subtitle text-muted">
                    Desculpe a inconveniência, mas estamos realizando algumas manutenções no momento. Estaremos de volta on-line
                    Em breve!
                </p>
                <div class="empty-action">
                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line>
                        </svg>
                        Me leve para o início
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
