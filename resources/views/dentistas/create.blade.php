 @extends('app')

 @section('titulo', 'Novo Dentistas')

 @section('conteudo')
 <h1>Novo Dentistas</h1>


 <form action="{{ route('dentistas.store') }}" method="POST">
     @csrf
     <div class="row">
         <div class="col-md-4">
             <div class="form-group">
                 <label for="nome" class="form-label">Nome</label>
                 <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
             </div>
         </div>
         <div class="col-md-4">
             <div class="form-group">
                 <label for="email" class="form-label">Email</label>
                 <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com">
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                 <label for="cro" class="form-label">CRO</label>
                 <input value="{{ old('cro') }}" type="number" class="form-control" id="cro" name="cro" placeholder="12345">
                 @error('cro')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                 <label for="cro_uf" class="form-label">CRO-UF</label>
                 <input value="{{ old('cro_uf') }}" type="text" class="form-control" id="cro_uf" name="cro_uf" placeholder="PR">
             </div>
         </div>
     </div>
     <br>
     <div class="row">
         <div class="col-md-12">
             <h4>Especialidades</h4>
             <div class="row">
                 @foreach ($especialidades as $especialidade)
                 <div class="col-md-2">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" value="{{ $especialidade->id }}" id="especialidade{{ $especialidade->id }}" name="especialidades[]">
                         <label class="form-check-label" for="especialidade{{ $especialidade->id }}">
                             {{ $especialidade->name }}
                         </label>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>

     <br>
     <button class="btn btn-success" type="submit">Enviar</button>
 </form>

 @endsection