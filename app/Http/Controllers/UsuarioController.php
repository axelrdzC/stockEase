<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(User $usuario) {
        return view('users.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, User $user) {
    
        $request->validate([
            'name' => 'required',
            'name_completo' => 'nullable',
            'email' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'img' => 'nullable|image', 
        ]);

        if ($request->hasFile('img')) {

            if ($user->img && $user->img !== '/storage/img/persona-default.jpg') {
                Storage::disk('public')->delete($user->img);
            }

            $nombre = $user->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/usuarios', $nombre, 'public');
            $user->img = '/storage/img/usuarios/'.$nombre;

        } elseif (!$request->hasFile('img') && $user->img !== '/storage/img/persona-default.jpg') {
            $user->img = '/storage/img/persona-default.jpg';
        }
        
        $user->save();
        $user->update($request->input());

        return redirect()->route('users.show', ['user' => $user])->with('status', 'Usuario modificado exitosamente');
    }


    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

}