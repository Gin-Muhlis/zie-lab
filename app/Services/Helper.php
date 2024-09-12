<?php

namespace App\Services;
use App\Models\Lesson;
use App\Models\Product;
use Illuminate\SUpport\Str;

class Helper {
    // generate random code untuk produk
    public static function generateRandomProductCode($length) {
        $code = Str::random($length);

        while(Product::where('code', $code)->exists()) {
            $code = Str::random($length);
        }

        return $code;
    }

    // generate random code untuk lesson/pelajaran
    public static function generateRandomLessonCode($length) {
        $code = Str::random($length);

        while(Lesson::where('code', $code)->exists()) {
            $code = Str::random($length);
        }

        return $code;
    }

    // memotong string judul product
    public static function cutTitleProductCard($title, $count) {
        $words = str_word_count($title, 1);

        $sub_title = array_slice($words, 0, $count);

        $result = implode(' ', $sub_title);
        
        if ($count <= count($sub_title)) {
            return $result . '...';
        } else {
            return $result;
        }
    }   

    // gambar alternatif avatar user
    public static function getInitialName($name) {
        $words = explode(' ', $name);
        $first_character = strtoupper(substr($words[0], 0, 1));
        $second_character = strtoupper(substr($words[1], 0, 1));

        return $first_character . $second_character;
    }
}