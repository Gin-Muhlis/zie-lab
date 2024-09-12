<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Belajar Dasar-dasar Programming',
                'description' => 'Belajar dasar-dasar programming dengan materi yang dapat dimengerti bahkan oleh anak TK',
                'category_id' => 1,
                'user_id' => 1,
                'price' => 99000,
                'type' => 'E-Course',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Panduan Lengkap JavaScript',
                'description' => 'Pelajari JavaScript dari dasar hingga mahir dengan panduan yang komprehensif.',
                'category_id' => 1,
                'user_id' => 1,
                'price' => 150000,
                'type' => 'E-Book',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Menguasai Laravel',
                'description' => 'Tutorial step-by-step untuk menguasai framework Laravel.',
                'category_id' => 1,
                'user_id' => 1,
                'price' => 200000,
                'type' => 'E-Course',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Dasar-dasar CSS',
                'description' => 'Panduan dasar untuk memahami CSS dan penerapannya.',
                'category_id' => 1,
                'user_id' => 1,
                'price' => 75000,
                'type' => 'E-File',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Mahir Python dalam 30 Hari',
                'description' => 'Belajar Python dari dasar hingga mahir dalam waktu 30 hari.',
                'category_id' => 1,
                'user_id' => 1,
                'price' => 180000,
                'type' => 'E-Book',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Seni Desain UI/UX',
                'description' => 'Panduan lengkap untuk menjadi desainer UI/UX profesional.',
                'category_id' => 10,
                'user_id' => 1,
                'price' => 230000,
                'type' => 'E-Course',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Investasi untuk Pemula',
                'description' => 'Pelajari dasar-dasar investasi dan bagaimana memulainya.',
                'category_id' => 9,
                'user_id' => 1,
                'price' => 120000,
                'type' => 'E-book',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Strategi Marketing di Media Sosial',
                'description' => 'Kiat sukses memasarkan produk dan jasa melalui media sosial.',
                'category_id' => 8,
                'user_id' => 1,
                'price' => 160000,
                'type' => 'E-Book',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Dasar-dasar Fotografi',
                'description' => 'Panduan untuk menguasai dasar-dasar fotografi bagi pemula.',
                'category_id' => 4,
                'user_id' => 1,
                'price' => 110000,
                'type' => 'E-Course',
                'status' => 'published'
            ],
            [
                'code' => Helper::generateRandomProductCode(10),
                'title' => 'Mengelola Keuangan Pribadi',
                'description' => 'Tips dan trik untuk mengelola keuangan pribadi dengan efektif.',
                'category_id' => 6,
                'user_id' => 1,
                'price' => 250000,
                'type' => 'E-File',
                'status' => 'published'
            ],
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}
