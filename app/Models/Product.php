<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'title', 'description', 'thumbnail', 'link_gdrive', 'file_book', 'category_id', 'user_id', 'price', 'type', 'status'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function benefits() {
        return $this->hasMany(Benefit::class);
    }

    public function Sections() {
        return $this->hasMany(Section::class);
    }

    // format harga produk
    public function formatPrice($price) {
        return number_format($price, 0, ',', '.');
    }
}
