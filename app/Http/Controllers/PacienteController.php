<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::orderBy('created_at', 'desc')->get();
        return view('admin.pacientes.index', ['pacientes' => $pacientes]);
    }

    public function create()
    {
        return view('admin.pacientes.create');
    }

    public function store(PacienteRequest $request)
    {
        Paciente::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'dataNascimento' => $request->dataNascimento,
            'sintomas' => $request->sintomas,
            'postoMedico' => $request->postoMedico,
        ]);
        return redirect()->route('pacientes.index')->with('success', 'Paciente adicionado.');
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', ['paciente' => $paciente]);
    }

    public function update(PacienteRequest $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->update([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'dataNascimento' => $request->dataNascimento,
            'sintomas' => $request->sintomas,
            'postoMedico' => $request->postoMedico,
        ]);
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado.');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente removido.');
    }
}
