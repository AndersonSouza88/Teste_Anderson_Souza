 @extends('app')

 @section('titulo', 'Lista de Dentistas')

 @section('conteudo')
        <h1>Lista de Dentistas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">CRO</th>
                    <th scope="col">CRO-UF</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dentistas as $dentista)
                <tr>
                    <th scope="row">{{ $dentista->id}}</th>
                    <td><a href="{{ route('dentistas.show', $dentista) }}">{{ $dentista->name }}</a></td>
                    <td>{{ $dentista->email }}</td>
                    <td>{{ $dentista->cro }}</td>
                    <td>{{ $dentista->cro_uf }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('dentistas.edit', $dentista) }}">Atualizar</a>
                        <form action="{{ route('dentistas.destroy', $dentista) }} " method="POST" style="display:inline;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a class="btn btn-success" href="{{ route('dentistas.create') }}">Novo Dentista</a>
@endsection