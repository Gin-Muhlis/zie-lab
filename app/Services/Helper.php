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

        $sub_title = array_slice($words, 0, 3);

        $result = implode(' ', $sub_title);

        return $result;
    }   
}