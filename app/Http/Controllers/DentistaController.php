<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\DentistaRequest;
use Illuminate\Http\Request;


class DentistaController extends Controller
{
    /**
     * Lista os Dentistas
     *
     * @return View
     */
    public function index(): View
    {
        $dentistas = Dentista::paginate(5);

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

    public function store(DentistaRequest $request): RedirectResponse
    {

        try {
            $dados = $request->except('_token');
        
        Dentista::create($dados);

        return redirect()->route('dentistas.index')
            ->with('mensagem', "cadastrado com sucesso!!");
        } catch (\Exception $e) {
            throw new \Exception("erro ao cadastrar " . $e->getMessage());
        }

       
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
     * @param DentistaRequest $request
     * @return RedirectResponse
     */
    public function update( int $id, DentistaRequest $request): RedirectResponse
    {
        
       $dentista = Dentista::find($id);
       $dentista->update([
            'name' => $request->name,
            'email' => $request->email,
            'cro' => $request->cro,
            'cro_uf' => $request->cro_uf
       ]);

       return redirect()->route('dentistas.index')
       ->with('mensagem', "Atualizado com sucesso!!");
    }

    /**
     * apaga um dentista no banco de dados
     */

    public function destroy(int $id): RedirectResponse
    {
        $dentista = Dentista::find($id);

        $dentista->delete();

        return redirect('/dentistas');


    }

    public function search(Request $request)
    {
        $dentistas = Dentista::where('name','LIKE', "%{$request->search}%")
                              ->orWhere('cro','LIKE', "%{$request->search}%")
                              ->paginate();
        return view('dentistas.index', compact('dentistas'));
        
    }

}
