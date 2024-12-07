<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
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
            'name' => 'required|string|max:255',
            'name_completo' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'telefono' => 'nullable|regex:/^[0-9]{10}$/',
            'direccion' => 'nullable|string|max:500',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede exceder 255 caracteres.',
            'name_completo.max' => 'El nombre completo no puede exceder 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'telefono.regex' => 'El número de teléfono debe tener exactamente 10 dígitos.',
            'direccion.max' => 'La dirección no puede exceder 500 caracteres.',
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.mimes' => 'La imagen debe ser de tipo jpg, jpeg, png o gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
        ]);
        

        if ($request->hasFile('img')) {

            if ($user->img && $user->img !== '/storage/img/persona-default.jpg') {
                Storage::disk('public')->delete($user->img);
            }

            $nombre = $user->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/usuarios', $nombre, 'public');
            $user->img = '/storage/img/usuarios/'.$nombre;

        }
        
        $user->save();
        $user->update($request->input());

        return redirect()->route('users.show', ['user' => $user])->with('status', 'Usuario modificado exitosamente');
    }


    public function show(User $user)
    {

        $actividadReciente = Audit::where('user_id', $user->id)->latest()->take(5)->get();
        return view('users.show', compact('user', 'actividadReciente'));

    }

}