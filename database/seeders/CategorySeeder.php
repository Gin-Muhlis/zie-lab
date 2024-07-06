<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Coding'
            ],
            [
                'name' => 'AI'
            ],
            [
                'name' => 'Digital Marketing'
            ],
            [
                'name' => 'Art'
            ],
            [
                'name' => 'Keuangan'
            ],
            [
                'name' => 'Pendidikan'
            ],
            [
                'name' => 'Self Improvement'
            ],
            [
                'name' => 'Sosial Media'
            ],
            [
                'name' => 'Finance'
            ],
            [
                'name' => 'Desain'
            ],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
