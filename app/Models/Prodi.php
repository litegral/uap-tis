<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama',
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
} 