<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'question' => 'Apa itu Zie Lab?',
                'answer' => 'Zie Lab adalah platform edukasi yang menyediakan e-course, e-book, dan e-file untuk pembelajaran yang dapat diakses secara online dan lifetime access.'
            ],
            [
                'question' => 'Apakah saya harus membayar untuk mendaftar di Zie Lab?',
                'answer' => 'ZTidak, pendaftaran di Zie Lab gratis. Namun, beberapa konten edukasi kami memerlukan pembayaran untuk diakses.'
            ], [
                'question' => 'Metode pembayaran apa saja yang diterima di Zie Lab?',
                'answer' => 'Kami menerima berbagai metode pembayaran melalui payment gateway, termasuk kartu kredit/debit, transfer bank, dan e-wallet.'
            ], [
                'question' => 'Apakah pembayaran saya aman?',
                'answer' => 'Keamanan pembayaran adalah prioritas utama kami. Kami menggunakan payment gateway yang terverifikasi dan aman untuk melindungi informasi keuangan Anda.'
            ], [
                'question' => 'Bagaimana cara mengakses e-course atau e-book yang sudah saya beli?',
                'answer' => 'Setelah pembelian berhasil, kamu bisa mengakses e-course atau e-book melalui akun panel kamu di Zie Lab. Semua konten yang telah dibeli akan tersedia di sana.'
            ], [
                'question' => 'Apakah ada batas waktu untuk mengakses e-course yang saya beli?',
                'answer' => 'Tidak, setelah kamu membeli e-course, kamu memiliki akses seumur hidup ke konten tersebut.'
            ],
        ];

        foreach ($data as $item) {
            Faq::create($item);
        }
    }
}
