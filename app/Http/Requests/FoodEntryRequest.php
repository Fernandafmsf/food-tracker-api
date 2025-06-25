<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'gramas' => 'required|numeric|min:1',
            'calorias_por_grama' => 'required|numeric|min:0',
            'criado_em' => 'required|date_format:Y-m-d',
        ];
    }
}
