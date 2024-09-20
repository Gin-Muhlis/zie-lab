<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'product_id' => ['required', 'exists:products,id']
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Nama bagian tidak boleh kosong',
            'name.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            
            'product_id.required' => 'Id produk tidak boleh kosong',
            'product_id.exists' => 'E-Course yang dipilih tidak valid.',
        ];
    }
}
