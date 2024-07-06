<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Pengenalan Programming',
                'order' => 1,
                'product_id' => 1
            ],
            [
                'name' => 'Variabel dan Tipe Data',
                'order' => 2,
                'product_id' => 1
            ],
            [
                'name' => 'Struktur Kontrol',
                'order' => 3,
                'product_id' => 1
            ],
            [
                'name' => 'Fungsi dan Prosedur',
                'order' => 4,
                'product_id' => 1
            ],
            [
                'name' => 'Penanganan Error',
                'order' => 5,
                'product_id' => 1
            ],
        
            // Sections for product 3 (E-Course)
            [
                'name' => 'Pengenalan Laravel',
                'order' => 1,
                'product_id' => 3
            ],
            [
                'name' => 'Instalasi dan Konfigurasi',
                'order' => 2,
                'product_id' => 3
            ],
            [
                'name' => 'Routing dan Controller',
                'order' => 3,
                'product_id' => 3
            ],
            [
                'name' => 'Model dan Database',
                'order' => 4,
                'product_id' => 3
            ],
            [
                'name' => 'Blade Template Engine',
                'order' => 5,
                'product_id' => 3
            ],
        
            // Sections for product 6 (E-Course)
            [
                'name' => 'Pengenalan UI/UX',
                'order' => 1,
                'product_id' => 6
            ],
            [
                'name' => 'Prinsip Desain UI',
                'order' => 2,
                'product_id' => 6
            ],
            [
                'name' => 'Wireframing dan Prototyping',
                'order' => 3,
                'product_id' => 6
            ],
            [
                'name' => 'Usability Testing',
                'order' => 4,
                'product_id' => 6
            ],
            [
                'name' => 'Desain Responsif',
                'order' => 5,
                'product_id' => 6
            ],
        
            // Sections for product 9 (E-Course)
            [
                'name' => 'Dasar-dasar Fotografi',
                'order' => 1,
                'product_id' => 9
            ],
            [
                'name' => 'Teknik Pengambilan Gambar',
                'order' => 2,
                'product_id' => 9
            ],
            [
                'name' => 'Pengaturan Kamera',
                'order' => 3,
                'product_id' => 9
            ],
            [
                'name' => 'Editing Foto',
                'order' => 4,
                'product_id' => 9
            ],
            [
                'name' => 'Komposisi dalam Fotografi',
                'order' => 5,
                'product_id' => 9
            ]
        ];

        foreach ($data as $item) {
            Section::create($item);
        }
    }
}
