<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'book_code',
        'category',
        'judul',
        'status',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'jumlah_stok',
        'lokasi_rak',
        'deskripsi',
        'cover',
    ];

    // Relasi many-to-many ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
