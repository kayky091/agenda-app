<!DOCTYPE html>
<html lang="pt-b">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
    <title>PDF-lista de contatos</title>
</head>

<body>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col" id="id">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>


            </tr>

        </thead>
        <tbody>
            @foreach ($contato as $contatos)
                <tr>
                    <td>{{ $contatos->id }}</td>
                    <td>{{ $contatos->nome }}</td>
                    <td>{{ $contatos->sobrenome }}</td>
                    <td>{{ $contatos->telefone }}</td>
                    <td>{{ $contatos->email }}</td>

                </tr>


            @endforeach


        </tbody>
    </table>

</body>

</html>
