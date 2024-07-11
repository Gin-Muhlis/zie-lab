<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Services\Helper;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Lessons for section 1 of product 1 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 1,
                'title' => 'Mengenal Apa Itu Programming',
                'content' => 'Programming adalah proses menulis, menguji, dan memelihara kode yang akan dieksekusi oleh komputer.',
                'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-',
                'is_preview' => true
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 1,
                'title' => 'Sejarah dan Perkembangan Programming',
                'content' => 'Programming telah berkembang pesat sejak pertama kali muncul di pertengahan abad ke-20.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 1,
                'title' => 'Mengapa Belajar Programming Penting',
                'content' => 'Programming penting karena menjadi dasar dari hampir semua teknologi yang kita gunakan sehari-hari.',
                 'order' => 3,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 2 of product 1 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 2,
                'title' => 'Pengertian Variabel',
                'content' => 'Variabel adalah tempat untuk menyimpan data yang dapat berubah-ubah.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 2,
                'title' => 'Tipe Data dalam Programming',
                'content' => 'Tipe data menentukan jenis nilai yang dapat disimpan dan dioperasikan dalam program.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 3 of product 1 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 3,
                'title' => 'Pengertian Struktur Kontrol',
                'content' => 'Struktur kontrol digunakan untuk mengatur alur eksekusi program berdasarkan kondisi tertentu.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 3,
                'title' => 'Jenis-jenis Struktur Kontrol',
                'content' => 'Jenis-jenis struktur kontrol termasuk if-else, switch, dan loop.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 4 of product 1 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 4,
                'title' => 'Pengertian Fungsi',
                'content' => 'Fungsi adalah blok kode yang dapat digunakan kembali untuk menjalankan tugas tertentu.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 4,
                'title' => 'Cara Membuat Fungsi',
                'content' => 'Cara membuat fungsi melibatkan deklarasi dan definisi fungsi dengan parameter dan nilai kembalian.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 5 of product 1 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 5,
                'title' => 'Penanganan Error',
                'content' => 'Penanganan error adalah proses mendeteksi dan menangani kesalahan dalam program.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 5,
                'title' => 'Teknik Debugging',
                'content' => 'Debugging adalah proses menemukan dan memperbaiki kesalahan dalam program.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 1 of product 3 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 6,
                'title' => 'Pengenalan Laravel',
                'content' => 'Laravel adalah framework PHP yang dirancang untuk membuat pengembangan web lebih mudah dan lebih cepat.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-',
                'is_preview' => true
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 6,
                'title' => 'Fitur-fitur Utama Laravel',
                'content' => 'Laravel memiliki fitur-fitur utama seperti routing, middleware, dan Eloquent ORM.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 2 of product 3 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 7,
                'title' => 'Instalasi Laravel',
                'content' => 'Instalasi Laravel dapat dilakukan melalui Composer, manajer paket PHP.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 7,
                'title' => 'Konfigurasi Dasar Laravel',
                'content' => 'Konfigurasi dasar Laravel meliputi pengaturan environment dan database.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 3 of product 3 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 8,
                'title' => 'Routing di Laravel',
                'content' => 'Routing di Laravel menentukan bagaimana permintaan HTTP diarahkan ke controller.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 8,
                'title' => 'Membuat Controller',
                'content' => 'Controller digunakan untuk menangani logika permintaan dan mengembalikan respons.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 4 of product 3 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 9,
                'title' => 'Model dan Eloquent ORM',
                'content' => 'Model digunakan untuk berinteraksi dengan database, dan Eloquent ORM memudahkan manipulasi data.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 9,
                'title' => 'Query Builder di Laravel',
                'content' => 'Query Builder menyediakan cara yang lebih mudah untuk membangun query database.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 5 of product 3 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 10,
                'title' => 'Blade Template Engine',
                'content' => 'Blade adalah template engine Laravel yang sederhana dan kuat.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 10,
                'title' => 'Membuat dan Menggunakan Komponen Blade',
                'content' => 'Komponen Blade memungkinkan penggunaan ulang kode HTML yang dinamis.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 1 of product 6 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 11,
                'title' => 'Pengertian UI/UX',
                'content' => 'UI adalah tampilan pengguna, sedangkan UX adalah pengalaman pengguna saat menggunakan aplikasi.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-',
                'is_preview' => true
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 11,
                'title' => 'Sejarah dan Perkembangan UI/UX',
                'content' => 'UI/UX telah berkembang seiring dengan perkembangan teknologi dan kebutuhan pengguna.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 2 of product 6 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 12,
                'title' => 'Prinsip Desain UI',
                'content' => 'Prinsip desain UI mencakup konsistensi, kejelasan, dan kemudahan penggunaan.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 12,
                'title' => 'Contoh Desain UI yang Baik',
                'content' => 'Desain UI yang baik memudahkan pengguna dalam berinteraksi dengan aplikasi.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 3 of product 6 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 13,
                'title' => 'Wireframing',
                'content' => 'Wireframing adalah proses membuat kerangka kerja kasar untuk halaman web atau aplikasi.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 13,
                'title' => 'Prototyping',
                'content' => 'Prototyping adalah pembuatan model awal dari produk untuk diuji dan diperbaiki.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 4 of product 6 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 14,
                'title' => 'Usability Testing',
                'content' => 'Usability testing adalah proses menguji seberapa mudah pengguna dapat menggunakan produk.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 14,
                'title' => 'Metode Usability Testing',
                'content' => 'Metode usability testing termasuk pengamatan langsung, wawancara, dan survei.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 5 of product 6 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 15,
                'title' => 'Desain Responsif',
                'content' => 'Desain responsif memastikan tampilan yang optimal di berbagai perangkat.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 15,
                'title' => 'Teknik Desain Responsif',
                'content' => 'Teknik desain responsif termasuk grid fleksibel, media query, dan gambar responsif.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 1 of product 9 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 16,
                'title' => 'Dasar-dasar Fotografi',
                'content' => 'Dasar-dasar fotografi mencakup pemahaman tentang exposure, aperture, dan shutter speed.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-',
                'is_preview' => true
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 16,
                'title' => 'Peralatan Fotografi',
                'content' => 'Peralatan fotografi yang dasar termasuk kamera, lensa, dan tripod.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 2 of product 9 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 17,
                'title' => 'Teknik Pengambilan Gambar',
                'content' => 'Teknik pengambilan gambar mencakup komposisi, framing, dan penggunaan cahaya.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 17,
                'title' => 'Sudut Pengambilan Gambar',
                'content' => 'Sudut pengambilan gambar dapat mempengaruhi suasana dan makna dari foto.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 3 of product 9 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 18,
                'title' => 'Pengaturan Kamera',
                'content' => 'Pengaturan kamera mencakup ISO, white balance, dan fokus.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 18,
                'title' => 'Mode Kamera',
                'content' => 'Mode kamera termasuk manual, otomatis, dan mode prioritas.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 4 of product 9 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 19,
                'title' => 'Editing Foto',
                'content' => 'Editing foto mencakup cropping, color correction, dan retouching.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 19,
                'title' => 'Software Editing Foto',
                'content' => 'Software editing foto yang populer termasuk Adobe Photoshop dan Lightroom.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],

            // Lessons for section 5 of product 9 (E-Course)
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 20,
                'title' => 'Komposisi dalam Fotografi',
                'content' => 'Komposisi mencakup aturan pertiga, garis panduan, dan keseimbangan.',
                 'order' => 1,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ],
            [
                'code' => Helper::generateRandomLessonCode(10),
                'section_id' => 20,
                'title' => 'Teknik Komposisi Lanjut',
                'content' => 'Teknik komposisi lanjut termasuk simetri, pola, dan tekstur.',
                 'order' => 2,
                'video_url' => 'https://youtu.be/J4KzV7Ihif4?si=6Li4ryMMcTPxdoO-'
            ]
        ];

        foreach ($data as $item) {
            Lesson::create($item);
        }
    }
}
