<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEfileRequest extends FormRequest
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
            'description' => ['required'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,jpg,png'],
            'link_gdrive' => ['required',   ],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric'],
            'status' => ['required', 'in:draft,published'],
            'thumbnail_product' => ['required'],
            'benefits' => ['required', 'array'],
            'benefits.*' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul tidak boleh kosong.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',

            'thumbnail.required' => 'Thumbnail tidak boleh kosong.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail hanya boleh dalam format JPEG, JPG, atau PNG.',

            'link_gdrive.required' => 'Link tidak boleh kosong.',
            'link_gdrive.url' => 'Link yang dimasukkan harus menggunakan protokol HTTPS.',

            'category_id.required' => 'Kategori tidak boleh kosong.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',

            'price.required' => 'Harga tidak boleh kosong.',
            'price.numeric' => 'Harga harus berupa angka.',

            'status.required' => 'Status tidak boleh kosong.',
            'status.in' => 'Status hanya boleh berupa draft atau published.',

            'benefits.required' => 'Benefit tidak boleh kosong.',
            'benefits.array' => 'Benefit harus berupa array.',
            'benefits.*.required' => 'Setiap benefit tidak boleh kosong.',
            'benefits.*.string' => 'Setiap benefit harus berupa teks.',
        ];
    }
}
