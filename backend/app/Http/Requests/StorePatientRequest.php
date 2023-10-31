<?php

namespace App\Http\Requests;

use App\Enums\Patient\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StorePatientRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'string|required|max:250',
            'email' => 'email|required|max:250',
            'cpf' => 'cpf||numeric|required|unique:App\Models\Patient,cpf',
            'rg' => 'numeric|max_digits:20',
            'phone' => 'celular_com_ddd|required',
            'gender' => [new Enum(GenderEnum::class)],
            'birth_date' => 'date|required|before:tomorrow',
            'description' => 'string',
        ];
    }
   
}
