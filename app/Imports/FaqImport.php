<?php

namespace App\Imports;

use App\Models\Faq;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FaqImport implements ToCollection, WithHeadingRow, WithValidation, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {
            Faq::create([
                'question' => $row['question'],
                'answer' => $row['answer']
            ]);
        }
    }

    public function headingRow(): int
    {
        return 5;
    }

    public function startRow(): int
    {
        return 6;
    }
    public function rules(): array
    {
        return [
            '*.question' => ['required', 'string', 'max:255'],
            '*.answer' => ['required', 'string'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.question.required' => 'Pertanyaan tidak boleh kosong.',
            '*.question.string' => 'Pertanyaan harus berupa teks.',
            '*.question.max' => 'Pertanyaan maksimal 255 karakter.',

            '*.answer.required' => 'Jawaban tidak boleh kosong.',
            '*.answer.string' => 'Jawaban harus berupa teks.',
        ];
    }
}
