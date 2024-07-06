<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                // Benefits for product 1
            [
                'benefit' => 'Dapat menguasai dasar-dasar programming',
                'product_id' => 1
            ],
            [
                'benefit' => 'Materi yang mudah dipahami',
                'product_id' => 1
            ],
            [
                'benefit' => 'Dapat dipelajari kapan saja',
                'product_id' => 1
            ],
            [
                'benefit' => 'Mendapat sertifikat',
                'product_id' => 1
            ],
            [
                'benefit' => 'Akses ke komunitas belajar',
                'product_id' => 1
            ],

                // Benefits for product 2
            [
                'benefit' => 'Memahami dasar-dasar JavaScript',
                'product_id' => 2
            ],
            [
                'benefit' => 'Latihan soal dan proyek',
                'product_id' => 2
            ],
            [
                'benefit' => 'Panduan langkah demi langkah',
                'product_id' => 2
            ],
            [
                'benefit' => 'Akses ke update konten terbaru',
                'product_id' => 2
            ],
            [
                'benefit' => 'Dapat diakses di berbagai perangkat',
                'product_id' => 2
            ],

                // Benefits for product 3
            [
                'benefit' => 'Menguasai framework Laravel',
                'product_id' => 3
            ],
            [
                'benefit' => 'Proyek praktis untuk latihan',
                'product_id' => 3
            ],
            [
                'benefit' => 'Akses ke materi tambahan',
                'product_id' => 3
            ],
            [
                'benefit' => 'Mendapat dukungan mentor',
                'product_id' => 3
            ],
            [
                'benefit' => 'Akses ke forum diskusi',
                'product_id' => 3
            ],

                // Benefits for product 4
            [
                'benefit' => 'Memahami CSS dengan mudah',
                'product_id' => 4
            ],
            [
                'benefit' => 'Panduan praktis dan aplikatif',
                'product_id' => 4
            ],
            [
                'benefit' => 'Contoh kasus yang bervariasi',
                'product_id' => 4
            ],
            [
                'benefit' => 'Akses ke sumber daya tambahan',
                'product_id' => 4
            ],
            [
                'benefit' => 'Materi selalu up-to-date',
                'product_id' => 4
            ],

                // Benefits for product 5
            [
                'benefit' => 'Menguasai Python dalam waktu singkat',
                'product_id' => 5
            ],
            [
                'benefit' => 'Dilengkapi dengan contoh nyata',
                'product_id' => 5
            ],
            [
                'benefit' => 'Mendapat bimbingan langsung',
                'product_id' => 5
            ],
            [
                'benefit' => 'Sertifikat kelulusan',
                'product_id' => 5
            ],
            [
                'benefit' => 'Akses ke komunitas pemrograman',
                'product_id' => 5
            ],

                // Benefits for product 6
            [
                'benefit' => 'Menguasai desain UI/UX',
                'product_id' => 6
            ],
            [
                'benefit' => 'Materi yang mudah dipahami',
                'product_id' => 6
            ],
            [
                'benefit' => 'Proyek nyata untuk latihan',
                'product_id' => 6
            ],
            [
                'benefit' => 'Dukungan dari mentor ahli',
                'product_id' => 6
            ],
            [
                'benefit' => 'Akses ke alat dan sumber daya desain',
                'product_id' => 6
            ],

                // Benefits for product 7
            [
                'benefit' => 'Memahami dasar-dasar investasi',
                'product_id' => 7
            ],
            [
                'benefit' => 'Tips investasi yang praktis',
                'product_id' => 7
            ],
            [
                'benefit' => 'Dapat diterapkan segera',
                'product_id' => 7
            ],
            [
                'benefit' => 'Akses ke komunitas investor',
                'product_id' => 7
            ],
            [
                'benefit' => 'Sumber daya tambahan untuk belajar',
                'product_id' => 7
            ],

                // Benefits for product 8
            [
                'benefit' => 'Strategi marketing yang efektif',
                'product_id' => 8
            ],
            [
                'benefit' => 'Tips dan trik dari para ahli',
                'product_id' => 8
            ],
            [
                'benefit' => 'Contoh kasus sukses',
                'product_id' => 8
            ],
            [
                'benefit' => 'Akses ke grup diskusi',
                'product_id' => 8
            ],
            [
                'benefit' => 'Materi up-to-date dengan tren terbaru',
                'product_id' => 8
            ],

                // Benefits for product 9
            [
                'benefit' => 'Dasar-dasar fotografi untuk pemula',
                'product_id' => 9
            ],
            [
                'benefit' => 'Teknik fotografi profesional',
                'product_id' => 9
            ],
            [
                'benefit' => 'Latihan praktis di setiap modul',
                'product_id' => 9
            ],
            [
                'benefit' => 'Bimbingan langsung dari ahli',
                'product_id' => 9
            ],
            [
                'benefit' => 'Akses ke komunitas fotografi',
                'product_id' => 9
            ],

                // Benefits for product 10
            [
                'benefit' => 'Mengelola keuangan pribadi dengan baik',
                'product_id' => 10
            ],
            [
                'benefit' => 'Tips hemat dan investasi',
                'product_id' => 10
            ],
            [
                'benefit' => 'Panduan langkah demi langkah',
                'product_id' => 10
            ],
            [
                'benefit' => 'Akses ke konsultasi keuangan',
                'product_id' => 10
            ],
            [
                'benefit' => 'Materi tambahan yang selalu up-to-date',
                'product_id' => 10
            ],
        ];

        foreach ($data as $item) {
            Benefit::create($item);
        }
    }
}
