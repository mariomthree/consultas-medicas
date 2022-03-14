<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilInformationRequest;
use App\Http\Requests\PerfilPasswordRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.usuarios.create', ['roles' => $roles]);
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->except('role_id');
        $data['password'] = bcrypt($request->password);
        $usuario = User::create($data);
        $role = Role::findOrFail($request->role_id);
        $usuario->attachRole($role);

        return redirect('admin/usuarios')->with('success', 'Utilizador adicionado.');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');

        return view('admin.usuarios.edit', [
            'usuario'  => $usuario,
            'roles' => $roles
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

        if (trim($request->password) == '') {
            $data = $request->except(['password', 'role_id']);
        } else {
            $data = $request->except(['role_id']);
            $data['password'] = bcrypt($request->password);
        }

        $usuario->update($data);

        $role = Role::findOrFail($request->role_id);
        $usuario->detachRoles($usuario->roles);
        $usuario->attachRole($role);
        return redirect('admin/usuarios')->with('success', 'Utilizador actualizado.');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('admin/usuarios')->with('success', 'Utilizador removido.');
    }

    public function perfil()
    {
        $usuario = auth()->user();
        return view('admin.usuarios.perfil', ['usuario' => $usuario]);
    }

    public function updateInformation(PerfilInformationRequest $request)
    {
        $usuario = auth()->user();
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);
        return redirect()->route('perfil')->with('success', 'Perfil actualizado.');
    }

    public function updatePassword(PerfilPasswordRequest $request)
    {
        $usuario = auth()->user();
        $usuario->update(['password' => Hash::make($request->password)]);
        return redirect()->route('perfil')->with('success', 'Senha actualizada.');
    }
}
