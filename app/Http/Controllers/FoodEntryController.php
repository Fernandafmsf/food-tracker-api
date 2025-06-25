<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodEntryRequest;
use App\Models\FoodEntry;
use Illuminate\Http\Request;

class FoodEntryController extends Controller
{
    public function store(FoodEntryRequest $request)
    {
        $validated = $request->validated();

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
