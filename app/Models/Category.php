<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'icon'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getIconAttribute($value) {
        return $value ? Storage::url($value) : null;
    }

}
