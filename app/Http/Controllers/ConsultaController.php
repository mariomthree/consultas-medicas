<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
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
        $consultas = Consulta::all();
        return view('admin.consultas.index',[
            'consultas' => $consultas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::pluck('nome','id');
        $pacientes = Paciente::pluck('nome','id');
        return view('admin.consultas.create',[
            'medicos' => $medicos,
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultaRequest $request)
    {
        Consulta::create($request->all());
        return redirect('/admin/consultas')->with('success','Consulta adicionada.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = Medico::pluck('nome','id');
        $pacientes = Paciente::pluck('nome','id');
        $consulta = Consulta::findOrFail($id);
        return view('admin.consultas.edit',[
            'consulta' => $consulta,
            'medicos' => $medicos,
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultaRequest $request, $id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());
        return redirect('/admin/consultas')->with('success','Consulta actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        return redirect('/admin/consultas')->with('success','Consulta removida.');
    }
}
