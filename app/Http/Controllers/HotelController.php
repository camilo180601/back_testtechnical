<?php
namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return response()->json(Hotel::with('habitaciones.acomodaciones')->get());
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|unique:hoteles',
                'direccion' => 'required',
                'ciudad' => 'required',
                'nit' => 'required|unique:hoteles',
                'numero_habitaciones' => 'required|integer'
            ], [
                'nombre.unique' => 'Ya existe un hotel con este nombre.',
                'nit.unique' => 'Este NIT ya está registrado para otro hotel.'
            ]);
    
            $hotel = Hotel::create($request->all());
    
            return response()->json([
                'message' => 'Hotel creado exitosamente',
                'hotel' => $hotel
            ], 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'messages' => $e->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        return response()->json(Hotel::with('habitaciones.acomodaciones')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return response()->json($hotel);
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
        return response()->json(['mensaje' => 'Hotel eliminado correctamente']);
    }
}