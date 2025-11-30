<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;

class JemaatApiController extends Controller
{
    // GET /api/jemaat
    public function index(Request $request)
    {
        $q = $request->query('q');

        $query = Jemaat::orderBy('nama');

        if ($q) {
            $query->where('nama', 'like', "%$q%")
                  ->orWhere('nik', 'like', "%$q%")
                  ->orWhere('email', 'like', "%$q%");
        }

        return response()->json([
            'success' => true,
            'message' => 'List data jemaat',
            'data' => $query->paginate(10)
        ]);
    }

    // POST /api/jemaat
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:50|unique:jemaat,nik',
            'email' => 'nullable|email|unique:jemaat,email',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,pasif,pindah',
        ]);

        $jemaat = Jemaat::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data jemaat berhasil dibuat',
            'data' => $jemaat
        ], 201);
    }

    // GET /api/jemaat/{id}
    public function show($id)
    {
        $jemaat = Jemaat::find($id);

        if (!$jemaat) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail jemaat',
            'data' => $jemaat
        ]);
    }

    // PUT /api/jemaat/{id}
    public function update(Request $request, $id)
    {
        $jemaat = Jemaat::find($id);

        if (!$jemaat) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:50|unique:jemaat,nik,' . $jemaat->id,
            'email' => 'nullable|email|unique:jemaat,email,' . $jemaat->id,
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,pasif,pindah',
        ]);

        $jemaat->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data jemaat berhasil diperbarui',
            'data' => $jemaat
        ]);
    }

    // DELETE /api/jemaat/{id}
    public function destroy($id)
    {
        $jemaat = Jemaat::find($id);

        if (!$jemaat) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $jemaat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data jemaat berhasil dihapus'
        ]);
    }
}
