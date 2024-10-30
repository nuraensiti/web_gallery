<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //mendefinisikan field yang boleh di isi
    protected $fillable = ['title', 'kategori_id', 'content', 'user_id', 'status'];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id'); // Pastikan menggunakan nama kolom yang benar
    }

    //Relasi  Post ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
