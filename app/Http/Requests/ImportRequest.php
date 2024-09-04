<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
            'file_import' => ['required', 'file', 'mimes:xlsx', 'max:2048']
        ];
    }

    public function messages(): array
    {
        return [
            'file_import.required' => 'File import tidak boleh kosong.',
            'file_import.image' => 'File import harus berupa gambar.',
            'file_import.mimes' => 'File import harus berupa xlsx.',
            'file_import.max' => 'Ukuran file import maksimal adalah 2MB.',
        ];
    }
}
