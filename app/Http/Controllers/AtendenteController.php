<?php

namespace App\Http\Controllers;

use App\Models\Atendente;
use Illuminate\Http\Request;

class AtendenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendentes = Atendente::paginate(15);
        return view('atendentes.index', compact('atendentes')); //mostrar na index todos os formul
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atendentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        try {

            $atendente = Atendente::create($data);
            flash('Atendente criado com sucesso!')->success();
            return redirect()->route('atendentes.index');
        } catch (\Exception $e) {

            $message = 'Erro ao criar atendentes';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function show(Atendente $atendente)
    {
        return view('atendentes.edit', compact('atendente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function edit(Atendente $atendente)
    {
        return redirect()->route('atendentes.show', ['atendente' => $atendente->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atendente $atendente)
    {
        $data = $request->all();
        try {

            $atendente->update($data);
            flash('Atendente alterado com sucesso!')->success();
            return redirect()->route('atendentes.show', ['atendente' => $atendente->id]);
        } catch (\Exception $e) {

            $message = 'Erro ao criar atendente';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->route('atendentes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendente $atendente)
    {
        try {

            $atendente->delete();
            flash('Atendente excluido com sucesso!')->success();
            return redirect()->route('atendentes.index');
        } catch (\Exception $e) {

            $message = 'Erro ao apagar o atendente';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }
}
