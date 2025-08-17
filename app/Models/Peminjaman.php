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
}
