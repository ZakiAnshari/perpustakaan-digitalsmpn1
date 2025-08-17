<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $fillable = [
        'judul_ebook',
        'penggarang',
        'penerbit',
        'tahun_terbit',
        'cover',
        'file_pdf'
    ];
}
