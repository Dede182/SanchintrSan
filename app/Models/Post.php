<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
