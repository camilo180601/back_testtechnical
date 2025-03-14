<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'tipo' => 'required|in:ESTANDAR,JUNIOR,SUITE',
            'cantidad' => 'required|integer'
        ]);

        $habitacion = Habitacion::create($request->all());
        return response()->json($habitacion, 201);
    }
}