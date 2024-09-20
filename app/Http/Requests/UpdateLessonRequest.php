<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
            'title_update' => ['required', 'max:255'],
            'content_update' => ['nullable'],
            'video_url_update' => ['nullable', 'url:https'],
        ];
    }

    public function messages(): array
    {
        return [
            'title_update.required' => 'Judul tidak boleh kosong.',
            'title_update.max' => 'Judul tidak boleh lebih dari 255 karakter.',

            'video_url_update.url' => 'URL video harus menggunakan protokol HTTPS yang valid.',
        ];
    }
}
