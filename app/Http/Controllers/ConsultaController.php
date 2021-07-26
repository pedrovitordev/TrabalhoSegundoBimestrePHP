<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consultas = Consulta::paginate(15);
        $medicos = Medico::all();
        return view('consultas.index', compact('consultas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('consultas.create',compact('medicos'),compact('pacientes'));
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

            $consulta = Consulta::create($data);
            flash('Consulta criada com sucesso!')->success();
  /*           $medicosconsulta->medicos()->save($medicos); */
           


            return redirect()->back()->withInput();
        } catch (\Exception $e) {

            $message = 'Erro ao criar consulta';

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
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        return view('consultas.edit', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        return redirect()->route('consultas.show', ['consulta' => $consulta->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        $data = $request->all();
        try {

            $consulta->update($data);
            flash('Consulta alterada com sucesso!')->success();
            return redirect()->route('consultas.show', ['consulta' => $consulta->id]);
        } catch (\Exception $e) {

            $message = 'Erro ao criar consulta';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->route('consultas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        try {

            $consulta->delete();
            flash('Consulta excluida com sucesso!')->success();
            return redirect()->route('consultas.index');
        } catch (\Exception $e) {

            $message = 'Erro ao apagar a consulta';

            if (env('APP_DEBUG')) {

                $message .= $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }
}
