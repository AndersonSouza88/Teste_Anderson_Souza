<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{

    /**
     * Mostra a lista de dentistas
     *
     * @return void
     */
    public function index()
    {
        return view('home');
    }

   /**
    * Cria um novo Dentista
    *
    * @return void
    */
    public function create()
    {
        echo "aqui é a criar";
    }


    /**
     * Mostrar o dentista por id
     */

    public function show(int $id){
       $dentistas = [
        1=> [
            'nome'=> 'Batman',
            'especialidade'=> 'arrancar dente na porrada'
        ],
        2=> [
            'nome'=> 'Robin',
            'especialidade'=> 'arrancar dente no tapa'
        ],
        3=> [
            'nome'=> 'Superman',
            'especialidade'=> 'arrancar dente com sopro'
        ],

       ];

       echo $dentistas[$id]['nome'];
       echo "<br>";
       echo $dentistas[$id]['especialidade'];
    }

    /**
     * Salva no Banco 
     *
     * @return void
     */
    public function store()
    {

    }

    /**
     * edita o dentista
     */

    public function edit()
    {
        echo "teste editar";
    }

    /**
     * salva no banco a edição
     *
     * @return void
     */
    public function update()
    {

    }
    /**
     * deleta o dentista
     *
     * @return void
     */
    public function destroy()
    {
        echo "teste excluir";
    }
}
