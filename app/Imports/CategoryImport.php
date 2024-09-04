<?php

namespace App\Imports;

use Storage;
use App\Models\Category;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\OnEachRow;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class CategoryImport implements ToCollection, WithHeadingRow, WithValidation, WithStartRow
{

    public function collection(Collection $collection)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load(request()->file('file_import'));
        $worksheet = $spreadsheet->getActiveSheet();

        $drawings = $worksheet->getDrawingCollection();
        $column_image = 'B';
        $start_row = 6;

        
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

            Category::create([
                'name' => $row['name'],
                'icon' => $image_url
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
            '*.name' => ['required', 'string']
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.name.string' => 'Nama kategori tidak valid.',
        ];
    }
}
