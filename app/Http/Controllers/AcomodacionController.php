<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acomodacion;
use App\Models\Habitacion;

class AcomodacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'habitacion_id' => 'required|exists:habitaciones,id',
            'tipo' => 'required'
        ]);

        $habitacion = Habitacion::find($request->habitacion_id);

        $validTypes = [
            'ESTANDAR' => ['SENCILLA', 'DOBLE'],
            'JUNIOR' => ['TRIPLE', 'CUÁDRUPLE'],
            'SUITE' => ['SENCILLA', 'DOBLE', 'TRIPLE']
        ];

        if (!in_array($request->tipo, $validTypes[$habitacion->tipo])) {
            return response()->json(['error' => 'Acomodación no permitida para este tipo de habitación'], 400);
        }

        $acomodacion = Acomodacion::create($request->all());
        return response()->json($acomodacion, 201);
    }
}