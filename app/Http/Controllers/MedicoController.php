<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::paginate(15);
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
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

            $medico = Medico::create($data);
            flash('Medico criado com sucesso!')->success();
            return redirect()->route('medicos.index');
        } catch (\Exception $e) {

            $message = 'Erro ao criar o medico/a';

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
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        return redirect()->route('medicos.show', ['medico' => $medico->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        $data = $request->all();
        try {

            $medico->update($data);
            flash('Medico alterado com sucesso!')->success();
            return redirect()->route('medicos.show', ['medico' => $medico->id]);
        } catch (\Exception $e) {

            $message = 'Erro ao criar medico/a';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {

        try {

            $medico->delete();
            flash('Medico excluido com sucesso!')->success();
            return redirect()->route('medicos.index');
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
