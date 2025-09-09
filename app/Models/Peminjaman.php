<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'nama_anggota',
        'buku',
        'tangal_pinjam',
        'tangal_jatuhtempo',
        'tangal_dikembalikan',
        'status',
    ];


    // Relasi ke User (anggota)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Book (buku)
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
