@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">

            <div class="d-flex">
                <a href="{{ route('contatos.index') }}"> <i style="font-size: 28px;" class="fa fa-long-arrow-left"
                        aria-hidden="true"></i></a>
            </div>
            <a class="navbar-brand">Editar contatos</a>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <form method="POST" action=" {{ route('contatos.update', $contato->id) }}" class="row g-3 needs-validation"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group mb-3 ">
                    <div class="col-md-4  me-5">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $contato->nome }}">
                    </div>

                    <div class="col-md-4  >
                    <label for=" sobrenome" class="form-label">
                        Sobrenome:</label>
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                            value="{{ $contato->sobrenome }}">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="col-md-4 me-5">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $contato->email }}">
                    </div>
                    <div class="col-md-4 ">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"
                            value="{{ $contato->telefone }}">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="image">Foto</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>


@endsection
