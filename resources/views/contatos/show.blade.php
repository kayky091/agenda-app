@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">

            <div class="d-flex">
                <a href="{{ route('contatos.index') }}"> <i style="font-size: 28px;" class="fa fa-long-arrow-left"
                        aria-hidden="true"></i></a>
            </div>
            <a class="navbar-brand">Visualizar contato</a>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <img style=" width:270px; height:270px;" src="/img/fotos/{{ $contato->photo_path }}" alt=""></th>
                <div class="infos " style="margin-left: 20px;">
                    <p><strong>Id:</strong> {{ $contato->id }}</p>
                    <hr>
                    <p><strong>Nome:</strong> {{ $contato->nome }}</p>
                    <hr>
                    <p><strong>Sobrenome:</strong> {{ $contato->sobrenome }}</p>
                    <hr>
                    <p><strong>Telefone:</strong> {{ $contato->telefone }}</p>
                    <hr>
                    <p><strong>Email:</strong> {{ $contato->email }}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>


@endsection
