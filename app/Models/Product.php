<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'harga', 'stok', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Category::class);
    }

}