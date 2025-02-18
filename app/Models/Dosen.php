<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'nama',
        'nip',
        'email',
    ];
}
