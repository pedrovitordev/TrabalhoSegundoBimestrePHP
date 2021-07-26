<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(15);
        return view('pacientes.index', compact('pacientes')); //mostrar na index todos os formularios
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //persistencias dos dados que vieram do create

        $data = $request->all();
        try {

            $paciente = Paciente::create($data);
            flash('Paciente criado com sucesso!')->success();
            return redirect()->route('pacientes.index');
            
        } catch (\Exception $e) {

            $message = 'Erro ao criar paciente';

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
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return redirect()->route('pacientes.show', ['paciente' => $paciente->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $data = $request->all();
        try {

            $paciente->update($data);
            flash('Paciente alterado com sucesso!')->success();
            return redirect()->route('pacientes.show', ['paciente' => $paciente->id]);
        } catch (\Exception $e) {

            $message = 'Erro ao criar paciente';

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
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {

        try {

            $paciente->delete();
            flash('Paciente excluido com sucesso!')->success();
            return redirect()->route('pacientes.index');
        } catch (\Exception $e) {

            $message = 'Erro ao apagar o paciente';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }
}
