<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class MahasiswaController extends Controller
{
    public function _construct()
    {

    }

    public function createMahasiswa(Request $request)
    {
        $nim   = $request->nim;
        $nama  = $request->nama;
        $email = $request->email;
        $prodi = $request->prodi;

        if (Mahasiswa::where('nim', $request->nim)->exists()) {
            return response()->json([
                'message' => 'NIM already exists',
                'data'    => null,
            ], 400);
        }

        $mahasiswa = Mahasiswa::create([
            'nim'   => $nim,
            'nama'  => $nama,
            'email' => $email,
            'prodi' => $prodi,
        ]);

        return response()->json([
            'message' => 'Mahasiswa created successfully',
            'data'    => [
                'mahasiswa' => $mahasiswa,
            ],
        ], 201);
    }

    public function getMahasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::all();

        return response()->json([
            'message' => 'List of mahasiswa',
            'data'    => $mahasiswa,
        ], 200);

    }

    public function getMahasiswaById(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (! $mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa not found',
                'data'    => null,
            ], 404);
        }

        return response()->json([
            'message' => 'Mahasiswa found',
            'data'    => $mahasiswa,
        ], 200);

    }

    public function updateMahasiswa(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (! $mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa not found',
                'data'    => null,
            ], 404);
        }

        $mahasiswa->update($request->only(['nim', 'nama', 'email', 'prodi']));

        return response()->json([
            'message' => 'Mahasiswa updated successfully',
            'data'    => $mahasiswa,
        ], 200);

    }

    public function deleteMahasiswa(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::were('nim', $nim)->first();

        if (! $mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa not found',
                'data'    => null,
            ], 404);
        }

        $mahasiswa->delete();

        return response()->json([
            'message' => 'Mahasiswa deleted successfully',
            'data'    => null,
        ], 200);

    }

}