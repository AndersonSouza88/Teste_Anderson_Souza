<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DentistaController extends Controller
{
    /**
     * Lista os Dentistas
     *
     * @return View
     */
    public function index(): View
    {
        $dentistas = Dentista::get();

        return view('dentistas.index', [
            'dentistas' => $dentistas
        ]);
    }

    /**
     * Monstra um Dentista especifico
     *
     * @param integer $id
     * @return View
     */        
    public function show(int $id): View
    {
        $dentista = Dentista::find($id);
       return view('dentistas.show', [
            'dentista'=> $dentista
       ]);
    }

    /**
     * Exibe o formulario de criação
     */

    public function create(): View
    {
        return view('dentistas.create');
    }

    /**
     * cria um dentista no banco de dados
     */

    public function store(Request $request): RedirectResponse
    {
        $dados = $request->except('_token');
        
        Dentista::create($dados);

        return redirect('/dentistas');
    }

    /**
     * mostra o formulario para a edição
     */

    public function edit(int $id): View
    {
        $dentista = Dentista::find($id);

        return view('dentistas.edit', [
            'dentista'=> $dentista
        ]);

    }

    /**
     * atualiza o dentista no banco de dados
     *
     * @param integer $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update( int $id, Request $request): RedirectResponse
    {
        
       $dentista = Dentista::find($id);
       $dentista->update([
            'name' => $request->name,
            'email' => $request->email,
            'cro' => $request->cro,
            'cro_uf' => $request->cro_uf
       ]);

       return redirect('/dentistas');
    }

    /**
     * apaga um dentista no banco de dados
     */

    public function destroy(int $id): RedirectResponse
    {
        $dentista = Dentista::find($id);

        $dentista->delete();

        return redirect('/');


    }

}
