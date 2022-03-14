<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Models\Medico;
use Carbon\Carbon;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::orderBy('created_at', 'desc')->get();
        return view('admin.medicos.index', ['medicos' => $medicos]);
    }

    public function create()
    {
        return view('admin.medicos.create');
    }

    public function store(MedicoRequest $request)
    {
        $dataNascimento = Carbon::parse($request->dataNascimento)->format('Y-m-d');
        Medico::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'dataNascimento' => $dataNascimento,
            'especialidade' => $request->especialidade,
            'postoMedico' => $request->postoMedico,
        ]);

        return redirect()->route('medicos.index')->with('success', 'Medico adicionado.');
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('admin.medicos.edit', ['medico' => $medico]);
    }

    public function update(MedicoRequest $request, $id)
    {
        $medico = Medico::findOrFail($id);
        $dataNascimento = Carbon::parse($request->dataNascimento)->format('Y-m-d');
        $medico->update([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'dataNascimento' => $dataNascimento,
            'especialidade' => $request->especialidade,
            'postoMedico' => $request->postoMedico,
        ]);

        return redirect()->route('medicos.index')->with('success', 'Medico actualizado.');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();
        return redirect()->route('medicos.index')->with('success', 'Medico removido.');
    }
}
