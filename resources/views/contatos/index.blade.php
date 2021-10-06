@extends('layouts.app')
@section('content')

    <!-- nav bar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Contatos</a>
            <div class="d-flex">
                <a class="btn btn-info me-3" href="{{ route('gerar-pdf') }}">Gerar PDF</a>
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Cadastrar
                </button>
                @if (isset($search))
                    <form class="d-flex" method="GET" action="{{ route('contatos.index') }}">

                        <input style="display: none" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search" id="search" name="search" value="">
                        <button class="btn btn-outline-success me-2" type="submit">Limpar busca</button>
                    </form>

                @endif

                <form class="d-flex" method="GET" action="{{ route('contatos.index') }}">

                    <input class="form-control me-2" type="search" placeholder="Pesquisar.." aria-label="Search" id="search"
                        name="search">
                    <button class="btn btn-outline-success" type="submit">Procurar</button>
                </form>
            </div>
        </div>
    </nav>
    <br>

    @if (session('success'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('edits'))
        <div class="alert  alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ session('edits') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('delete'))
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('delete') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (count($contato) == 0)
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <strong>Nao existe " {{ $search }} " nos registros</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <!-- Tabela de registros -->

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Opcoes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contato as $contatos)
                <tr>
                    <th scope="row"><img style="border-radius: 50%; width:50px; height:50px;"
                            src="/img/fotos/{{ $contatos->photo_path }}" alt=""></th>
                    <td>{{ $contatos->nome }}</td>
                    <td>{{ $contatos->sobrenome }}</td>
                    <td>{{ $contatos->telefone }}</td>
                    <td>{{ $contatos->email }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('contatos.edit', $contatos->id) }}">editar</a>
                        <a class="btn btn-info" href="{{ route('contatos.show', $contatos->id) }}">visualizar</a>
                        <a class="btn btn-danger" onclick=" return confirm('Tem certeza que deseja deletar este registro?')"
                            href="{{ url('delete', ['id' => $contatos->id]) }}">Remover</a>

                    </td>
                </tr>


            @endforeach


        </tbody>
    </table>
   
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('contatos.store') }}" class="row g-3 needs-validation"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-4">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>

                        </div>

                        <div class="col-md-4">
                            <label for="sobrenome" class="form-label">Sobrenome:</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>

                        </div>

                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Foto</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




@endsection
