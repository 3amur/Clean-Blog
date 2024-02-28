<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image', 'category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        if(file_exists(public_path($this->image))){
            return asset($this->image);
        }
        return asset('front/' . '1.png');

    }
}
