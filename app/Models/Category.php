<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
  
    protected $fillable = ['kategori_name']; // Specify the fillable fields

    //relasi Category ke Post (one to many)
    public function posts()
    {
        return $this->hasMany(Post::class, 'kategori_id', 'id');
    }
}
