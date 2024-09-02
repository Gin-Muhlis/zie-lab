<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'icon' => ['required', 'image', 'mimes:png', 'max:2048']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori tidak boleh kosong.',
            'name.string' => 'Nama kategori tidak valid.',
            'icon.required' => 'Icon kategori tidak boleh kosong.',
            'icon.image' => 'File icon harus berupa gambar.',
            'icon.mimes' => 'Icon hanya boleh dalam format PNG.',
            'icon.max' => 'Ukuran icon maksimal adalah 2MB.',
        ];
    }
}
