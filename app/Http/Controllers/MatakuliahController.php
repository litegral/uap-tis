<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return response()->json($matakuliahs);
    }

    public function storeToMahasiswa(Request $request)
    {
        $this->validate($request, [
            'matakuliah_id' => 'required|integer|exists:matakuliahs,id'
        ]);

        $mahasiswa = Auth::user();

        if ($mahasiswa->matakuliahs()->where('matakuliahs.id', $request->matakuliah_id)->exists()) {
            return response()->json(['message' => 'Mata kuliah already taken'], 409);
        }

        $mahasiswa->matakuliahs()->attach($request->matakuliah_id);

        return response()->json(['message' => 'Mata kuliah added successfully']);
    }

    public function myMatakuliahs()
    {
        $mahasiswa = Auth::user();
        return response()->json($mahasiswa->matakuliahs);
    }

    public function isMatkulRegistered($id)
    {
        $matakuliah = Matakuliah::find($id);

        if (!$matakuliah) {
            return response()->json(['message' => 'Mata kuliah not found'], 404);
        }

        $mahasiswa = Auth::user();
        $isRegistered = $mahasiswa->matakuliahs()->where('matakuliahs.id', $id)->exists();

        return response()->json([
            'is_registered' => $isRegistered,
            'matakuliah' => [
                'id' => $matakuliah->id,
                'nama' => $matakuliah->nama,
            ],
        ]);
    }
} 