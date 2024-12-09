<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\StockLowNotification;
use Iluminate\Support\Facades\Notification;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function checkStock()
    {
        $inventarios = Inventario::all();

        foreach ($inventarios as $inventario) {
            if ($inventario->cantidad_actual < $inventario->stock_min) {
                Notification::send(auth()->user(), new StockLowNotification($inventario));
            }
        }

        return redirect()->back()->with('success', 'Notificaciones enviadas');
    }
}
