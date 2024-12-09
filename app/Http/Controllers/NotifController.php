<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifController extends Controller
{
    public function index()
    {
        $notificaciones = Auth::user()->notifications;
        return view('notificaciones.index', compact('notificaciones'));
    }

    public function show($id)
    {
        $notificacion = Auth::user()->notifications()->find($id);

        if (!$notificacion) {
            return redirect()->route('notificaciones.index')->with('error', 'Notificación no encontrada.');
        }

        return view('notificaciones.show', compact('notificacion'));
    }
}
