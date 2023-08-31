 @extends('app')

 @section('titulo', 'Novo Dentistas')

 @section('conteudo')
 <h1>Novo Dentistas</h1>

 <form action="{{ route('dentistas.store') }}" method="POST">
    @csrf
     <div class="mb-3">
         <label for="nome" class="form-label">Nome</label>
         <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
     </div>
     <div class="mb-3">
         <label for="email" class="form-label">Email</label>
         <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com"required>
     </div>
     <div class="mb-2">
         <label for="cro" class="form-label">CRO</label>
         <input type="number" class="form-control" id="cro" name="cro" placeholder="12345" required>
     </div>
     <div class="mb-2">
         <label for="cro_uf" class="form-label">CRO-UF</label>
         <input type="text" class="form-control" id="cro_uf" name="cro_uf" placeholder="PR" required>
     </div> 

     <button class="btn btn-success" type="submit">Enviar</button>
 </form>

 @endsection