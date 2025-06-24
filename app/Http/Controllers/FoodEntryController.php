<?php

namespace App\Http\Controllers;

use App\Models\FoodEntry;
use Illuminate\Http\Request;

class FoodEntryController extends Controller
{
    public function store(Request $request)
    {

        //Ajustar requested dps pra ficar em arquivo separado
        $validated = $request->validate([
            'nome' => 'required|string',
            'gramas' => 'required|numeric',
            'calorias_por_grama' => 'required|numeric',
            'criado_em' => 'required|date',
        ]);

        $entrada = FoodEntry::create($validated);

        return response()->json($entrada, 201);
    }

    public function relatorioDiario(Request $request)
    {
        $data = $request->input('date', now()->toDateString());

        $entradas = FoodEntry::whereDate('criado_em', $data)->get();

        return response()->json([
            'data' => $data,
            'entradas' => $entradas,
        ]);
    }
}
