<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return response()->json($mahasiswas);
    }

    public function getByProdi($id)
    {
        $mahasiswas = Mahasiswa::where('prodi_id', $id)->with('prodi')->get();

        if ($mahasiswas->isEmpty()) {
            return response()->json(['message' => 'No mahasiswa found for this prodi'], 404);
        }
        
        return response()->json($mahasiswas);
    }
} 