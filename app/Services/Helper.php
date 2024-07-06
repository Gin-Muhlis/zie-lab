<?php

namespace App\Services;
use App\Models\Product;
use Illuminate\SUpport\Str;

class Helper {
    public static function generateRandomCode($length) {
        $code = Str::random($length);

        while(Product::where('code', $code)->exists()) {
            $code = Str::random($length);
        }

        return $code;
    }
}