<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pustakawan extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nip',
    ];
}
