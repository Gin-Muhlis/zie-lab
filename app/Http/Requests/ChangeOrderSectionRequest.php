<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeOrderSectionRequest extends FormRequest
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
            'old_order' => ['required', 'numeric'],
            'new_order' => ['required', 'numeric'],
         ];
    }

    public function messages()
    {
        return [
            'old_order.required' => 'Urutan sebelumnya tidak boleh kosong',
            'old_order.numeric' => 'Urutan sebelumnya tidak valid',

            'new_order.required' => 'Urutan baru tidak boleh kosong',
            'new_order.numeric' => 'Urutan baru tidak valid',
        ];
    }
}
