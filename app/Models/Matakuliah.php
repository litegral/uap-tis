<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama',
    ];

    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'mkId', 'mhsNim');
    }
} 