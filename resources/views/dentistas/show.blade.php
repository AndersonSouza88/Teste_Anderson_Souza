@extends('app')

@section ('titulo', 'Detalhes do Dentists')

@section('conteudo')
        <div class="card">
            <h5 class="card-header">Detalhes do Dentista {{ $dentista->name }} </h5>
            <div class="card-body">
                <p><strong>Id:</strong> {{ $dentista->id }}</p>
                <p><strong>E-mail:</strong> {{ $dentista->email }}</p>
                <p><strong>CRO:</strong> {{ $dentista->cro }}</p>
                <p><strong>CRO-UF:</strong> {{ $dentista->cro_uf }}</p>
                
                <a class="btn btn-success" href="{{ route ('dentistas.index')}}">Voltar para lista</a>
            </div>
        </div>
 @endsection       