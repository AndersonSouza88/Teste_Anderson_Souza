 @extends('app')

 @section('titulo', 'Editar Dentistas')

 @section('conteudo')
 <h1>Editar Dentistas</h1>

 <form action="{{ route('dentistas.update',$dentista) }}" method="POST">
     @csrf
     @method('PUT')
     <div class="row">
         <div class="col-md-4">
             <div class="form-group">
                 <label for="nome" class="form-label">Nome</label>
                 <input type="text" value="{{ old('name', $dentista->name) }}" class="form-control" id="name" name="name" placeholder="Digite o nome">
             </div>
         </div>
         <div class="col-md-4">
             <div class="form-group">
                 <label for="email" class="form-label">Email</label>
                 <input type="email" value="{{ old('email', $dentista->email) }}" class="form-control" id="email" name="email" placeholder="email@exemplo.com">
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                 <label for="cro" class="form-label">CRO</label>
                 <input type="number" value="{{ old('cro', $dentista->cro) }}" class="form-control" id="cro" name="cro" placeholder="12345" readonly>
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                 <label for="cro_uf" class="form-label">CRO-UF</label>
                 <input type="text" value="{{ old('cro_uf', $dentista->cro_uf) }}" class="form-control" id="cro_uf" name="cro_uf" placeholder="PR">
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
                         <input class="form-check-input" type="checkbox" value="{{ $especialidade->id }}" id="especialidade{{ $especialidade->id }}" name="especialidades[]" @if($dentista->especialidades->contains($especialidade->id)) checked @endif>
                         <label class="form-check-label" for="especialidade{{ $especialidade->id }}">
                             {{ $especialidade->name }}
                         </label>
                     </div>
                 </div>
                 @endforeach

             </div>
         </div>

     </div>

     <button class="btn btn-primary" type="submit">Atualizar</button>
 </form>

 @endsection