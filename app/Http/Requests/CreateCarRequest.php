<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'carBrand' => 'required|exists:car_brands,id',
            'carModel' => 'required|exists:car_models,id',
            'yearMade' => 'required|integer|min:1900|date_format:"Y"',
            'ownerName' => 'required|string|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}