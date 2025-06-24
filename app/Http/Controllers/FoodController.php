<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FoodController extends Controller
{
    public function search (Request $request){
        $query = $request->input('query');

        $response = Http::get("https://api.nal.usda.gov/fdc/v1/foods/search", [
            'query' => $query,
            'api_key' => env('FOOD_API_KEY'),
        ]);

        $foods = collect($response['foods'])->map(function ($food){
            return [
                'descricao' => $food['description'],
                'calorias_por_grama' => $this->getCaloriasPorGrama($food),
            ];
        });

        return response()->json($foods);

    }

    private function getCaloriasPorGrama($food){
        $caloria = collect($food['foodNutrients'])->firstWhere('nutrientName', 'Energy');
        return $caloria ? $caloria['value'] / 100 : 0;
    }
}
