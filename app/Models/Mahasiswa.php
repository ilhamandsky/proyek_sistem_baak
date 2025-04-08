<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'program_studi',
        'fakultas',
        'tahun_masuk'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
