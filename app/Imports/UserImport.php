<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToCollection, WithHeadingRow, WithValidation, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load(request()->file('file_import'));
        $worksheet = $spreadsheet->getActiveSheet();

        $drawings = $worksheet->getDrawingCollection();
        $column_image = 'E';
        $start_row = 6;

        // dd($drawings);
        
        foreach($collection as $row) {
            $image = null;
            foreach($drawings as $drawing) {
                if ($drawing->getCoordinates() == $column_image . $start_row) {
                    $image = $drawing;
                }
            }
            $drawing_path = $image->getPath();
            $extension = pathinfo($drawing_path, PATHINFO_EXTENSION);
            $name = Str::random(40);
            $image_url = "public/images/categories/{$name}.{$extension}";
            $image_path = storage_path('/app' . '/' . $image_url);

            $contents = file_get_contents($drawing_path);
            file_put_contents($image_path, $contents);
            
            $start_row++;

            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'password' => Hash::make($row['password']),
                'image' => $image_url
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
            '*.name' => ['required', 'string'],
            '*.email' => ['required', 'unique:users,email', 'email'],
            '*.phone' => ['required'],
            '*.password' => ['required'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.name.required' => 'Nama tidak boleh kosong',
            '*.name.string' => 'Nama harus berupa string',
            '*.email.required' => 'Email tidak boleh kosong',
            '*.email.email' => 'Format email tidak valid',
            '*.email.unique' => 'Email sudah terdaftar, gunakan email lain',
            '*.phone.required' => 'Nomor telepon tidak boleh kosong',
            '*.password.required' => 'Password tidak boleh kosong',
        ];
    }
}
