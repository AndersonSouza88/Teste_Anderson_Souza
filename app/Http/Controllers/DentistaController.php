<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use App\Models\Especialidade;
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
            'dentista' => $dentista
        ]);
    }

    /**
     * Exibe o formulario de criação
     */

    public function create(): View
    {
        $especialidades = Especialidade::all();
        return view('dentistas.create', compact('especialidades'));
    }

    /**
     * cria um dentista no banco de dados
     */

     public function store(DentistaRequest $request): RedirectResponse
     {
         $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'cro' => 'required|numeric|unique:dentistas,cro',
             'cro_uf' => 'required|string|size:2',
         ]);
     
         // Obtenha o valor do campo "cro_uf" e converta para maiúsculas
         $croUf = strtoupper($request->input('cro_uf'));
     
         // Verifique novamente se o CRO já está em uso (para maior segurança)
         if (Dentista::where('cro', $request->input('cro'))->exists()) {
             return redirect()->back()->withInput()->withErrors(['cro' => 'Este CRO já está em uso.']);
         }
     
         try {
             $dentista = Dentista::create([
                 'name' => $request->input('name'),
                 'email' => $request->input('email'),
                 'cro' => $request->input('cro'),
                 'cro_uf' => $croUf,
             ]);
     
             $especialidadesSelecionadas = $request->input('especialidades', []);
     
             $dentista->especialidades()->attach($especialidadesSelecionadas);
     
             return redirect()->route('dentistas.index')
                 ->with('mensagem', "Dentista criado com sucesso!!");
         } catch (\Exception $e) {
             return redirect()->back()
                 ->withInput()
                 ->withErrors(['Erro ao criar o dentista. Por favor, tente novamente.']);
         }
     }
     

    /**
     * mostra o formulario para a edição
     */

    public function edit(int $id): View
    {
        $dentista = Dentista::find($id);

        $especialidades = Especialidade::all();

        return view('dentistas.edit', compact('dentista', 'especialidades'));
    }

    /**
     * atualiza o dentista no banco de dados
     *
     * @param integer $id
     * @param DentistaRequest $request
     * @return RedirectResponse
     */
    public function update(int $id, DentistaRequest $request): RedirectResponse
    {

        try {
            $dentista = Dentista::find($id);
            $dentista->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'cro_uf' => $request->input('cro_uf'),
                // Não inclua 'cro' aqui para evitar a atualização
            ]);

            // Obtenha os IDs das especialidades selecionadas
            $especialidadesSelecionadas = $request->input('especialidades', []);

            // Sincronize apenas os IDs das especialidades do dentista
            $dentista->especialidades()->sync($especialidadesSelecionadas);

            return redirect()->route('dentistas.index')
                ->with('mensagem', "Atualizado com sucesso!!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['Erro ao atualizar o dentista. Por favor, tente novamente.']);
        }
    }

    /**
     * apaga um dentista no banco de dados
     */

    public function destroy(int $id): RedirectResponse
    {
        try {
            $dentista = Dentista::find($id);

            $dentista->especialidades()->detach();

            $dentista->delete();

            return redirect('/dentistas')
                ->with('mensagem', "Deletado com sucesso!!");
        } catch (\Exception $e) {
            return redirect('/dentistas')
                ->withErrors(['Erro ao deletar o dentista. Por favor, tente novamente.']);
        }
    }

    public function search(Request $request)
    {
        $dentistas = Dentista::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('cro', 'LIKE', "%{$request->search}%")
            ->orWhere('cro_uf', 'LIKE', "%{$request->search}%")
            ->paginate();
        return view('dentistas.index', compact('dentistas'));
    }
}
