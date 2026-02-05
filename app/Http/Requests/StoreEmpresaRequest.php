<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
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
        'cnpj' => 'required|string|size:18',
        'icms_pago' => 'required|integer|min:1',
        'creditos_possiveis' => 'required|integer|min:0',
      ];
    }
}
