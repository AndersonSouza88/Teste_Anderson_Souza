 @extends('app')

 @section('titulo', 'Editar Dentistas')

 @section('conteudo')
 <h1>Editar Dentistas</h1>

 <form action="{{ route('dentistas.update',$dentista) }}" method="POST">
    @csrf
    @method('PUT')

     <div class="mb-3">
         <label for="nome" class="form-label">Nome</label>
         <input type="text" value="{{ old('name', $dentista->name) }}" class="form-control" id="name" name="name" placeholder="Digite o nome" >
     </div>
     <div class="mb-3">
         <label for="email" class="form-label">Email</label>
         <input type="email" value="{{ old('email', $dentista->email) }}" class="form-control" id="email" name="email" placeholder="email@exemplo.com" >
     </div>
     <div class="mb-2">
         <label for="cro" class="form-label">CRO</label>
         <input type="number" value="{{ old('cro', $dentista->cro) }}" class="form-control" id="cro" name="cro" placeholder="12345" >
     </div>
     <div class="mb-2">
         <label for="cro_uf" class="form-label">CRO-UF</label>
         <input type="text" value="{{ old('cro_uf', $dentista->cro_uf) }}" class="form-control" id="cro_uf" name="cro_uf" placeholder="PR" >
     </div> 

     <button class="btn btn-primary" type="submit">Atualizar</button>
 </form>

 @endsection