<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileCompanyRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'max_digits:20'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string'],
            'icon' => ['nullable', 'image', 'mimes:png', 'max:2048']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Nama tidak boleh kosong.',
            'title.string' => 'Nama harus berupa teks.',
            'title.max' => 'Nama maksimal 255 karakter.',

            'about.required' => 'Deskripsi tidak boleh kosong.',
            'about.string' => 'Deskripsi harus berupa teks.',

            'phone.required' => 'Nomor telepon tidak boleh kosong.',
            'phone.numeric' => 'Nomor telepon harus berupa angka.',
            'phone.max' => 'Nomor telepon maksimal 20 digit.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',

            'address.required' => 'Alamat tidak boleh kosong.',
            'address.string' => 'Alamat harus berupa teks.',

            'icon.required' => 'Icon tidak boleh kosong.',
            'icon.image' => 'File icon harus berupa gambar.',
            'icon.mimes' => 'Icon hanya boleh dalam format PNG.',
            'icon.max' => 'Ukuran icon maksimal adalah 2MB.',
        ];
    }



}
