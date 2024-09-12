<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name_update' => ['required', 'string'],
            'email_update' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'phone_update' => ['required'],
            'password_update' => ['nullable'],
            'image_update' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048']
        ];
    }

    public function messages(): array
    {
        return [
            'name_update.required' => 'Nama tidak boleh kosong',
            'name_update.string' => 'Nama harus berupa string',
            'email_update.required' => 'Email tidak boleh kosong',
            'email_update.email' => 'Format email tidak valid',
            'email_update.unique' => 'Email sudah terdaftar, gunakan email lain',
            'phone_update.required' => 'Nomor telepon tidak boleh kosong',
            'image_update.image' => 'File gambar harus berupa gambar.',
            'image_update.mimes' => 'Gambar hanya boleh dalam format PNG.',
            'image_update.max' => 'Ukuran gambar maksimal adalah 2MB.'
        ];
    }
}
