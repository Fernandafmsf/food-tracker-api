<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodEntry extends Model
{
    protected $fillable = [ 
        'nome',
        'gramas',
        'calorias_por_grama',
        'total_calorias', 
        'criado_em',
    ];

    protected static function booted()
    {
        //Calcula as calorias totais ao criar um foodEntry
        static::creating(function ($entrada){
            $entrada->total_calorias = $entrada->gramas * $entrada->calorias_por_grama;
        });
    }
}
