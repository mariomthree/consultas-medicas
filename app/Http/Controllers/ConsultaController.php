<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Carbon\Carbon;

class ConsultaController extends Controller
{

    public function index()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('admin.consultas.index', ['consultas' => $consultas]);
    }

    public function create()
    {
        $medicos = Medico::pluck('nome', 'id');
        $pacientes = Paciente::pluck('nome', 'id');

        return view('admin.consultas.create', [
            'medicos' => $medicos,
            'pacientes' => $pacientes,
        ]);
    }

    public function store(ConsultaRequest $request)
    {
        $dataMarcacao = Carbon::parse($request->dataMarcacao)->format('Y-m-d');
        Consulta::create([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'dataMarcacao' => $dataMarcacao,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta adicionada.');
    }

    public function edit($id)
    {
        $medicos = Medico::pluck('nome', 'id');
        $pacientes = Paciente::pluck('nome', 'id');
        $consulta = Consulta::findOrFail($id);

        return view('admin.consultas.edit', [
            'consulta' => $consulta,
            'medicos' => $medicos,
            'pacientes' => $pacientes,
        ]);
    }

    public function update(ConsultaRequest $request, $id)
    {
        $consulta = Consulta::findOrFail($id);
        $dataMarcacao = Carbon::parse($request->dataMarcacao)->format('Y-m-d');
        $consulta->update([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'dataMarcacao' => $dataMarcacao,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta actualizada.');
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect()->route('consultas.index')->with('success', 'Consulta removida.');
    }
}
