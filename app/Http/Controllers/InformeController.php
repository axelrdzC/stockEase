<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        $informes = Informe::latest()->paginate(10);
        return view('informes.index', compact('informes'));
    }

    public function create()
    {
        return view('informes.create');
    }

}