<?php

namespace Database\Seeders;

use App\Models\ProfileCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title' => 'Zie Lab',
            'about' => 'Platform edukasi yang menyediakan e-book, e-course, dan e-file berkualitas. Kami menawarkan berbagai materi edukatif, dari dasar hingga lanjutan.',
            'phone' => '0895616007300',
            'email' => 'zielabstudio@gmail.com',
            'address' => 'Jl. Siliwangi No.41, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212',
            'icon' => 'images/company/logo.png'
        ];

        ProfileCompany::create($data);
    }
}
