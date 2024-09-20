<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'content' => ['nullable'],
            'video_url' => ['nullable', 'url:https'],
            'section_id' => ['required', 'exists:sections,id']
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'Judul tidak boleh kosong.',
        'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',

        'video_url.url' => 'URL video harus menggunakan protokol HTTPS yang valid.',

        'section_id.required' => 'Bagian (section) tidak boleh kosong.',
        'section_id.exists' => 'Bagian (section) yang dipilih tidak valid.',
    ];
}

}
