<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'tempat_tinggal',
        'tanggal_lahir',
        'no_telp',
        'email',
        'poto',
    ];
}
