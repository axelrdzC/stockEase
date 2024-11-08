<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = Orden::latest()->paginate(10);
        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        return view('ordenes.create');
    }

}