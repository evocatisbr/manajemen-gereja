<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class JemaatController extends Controller
{

    public function index(Request $request)
{
    $q = $request->query('q');
    $query = Jemaat::orderBy('nama');

    if ($q) {
        $query->where('nama', 'like', "%{$q}%")
              ->orWhere('nik', 'like', "%{$q}%")
              ->orWhere('email', 'like', "%{$q}%");
    }

    $jemaat = $query->paginate(10)->withQueryString();

    // Untuk AJAX search
    if ($request->ajax()) {
        return view('jemaat._table', compact('jemaat'))->render();
    }

    return view('jemaat.index', compact('jemaat'));
}


    public function create()
    {
        return view('jemaat.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:50|unique:jemaat,nik',
            'email' => 'nullable|email|unique:jemaat,email',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'status' => ['required', Rule::in(['aktif','pasif','pindah'])],
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('jemaat', 'public');
            $data['foto'] = $path;
        }

        Jemaat::create($data);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dibuat.');
    }

    public function show(Jemaat $jemaat)
    {
        return view('jemaat.show', compact('jemaat'));
    }

    public function edit(Jemaat $jemaat)
    {
        return view('jemaat.edit', compact('jemaat'));
    }

    public function update(Request $request, Jemaat $jemaat)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => ['nullable','string','max:50', Rule::unique('jemaat','nik')->ignore($jemaat->id)],
            'email' => ['nullable','email', Rule::unique('jemaat','email')->ignore($jemaat->id)],
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'status' => ['required', Rule::in(['aktif','pasif','pindah'])],
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($jemaat->foto) {
                Storage::disk('public')->delete($jemaat->foto);
            }
            $path = $request->file('foto')->store('jemaat', 'public');
            $data['foto'] = $path;
        }

        $jemaat->update($data);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil diperbarui.');
    }

    public function destroy(Jemaat $jemaat)
    {
        if ($jemaat->foto) {
            Storage::disk('public')->delete($jemaat->foto);
        }
        $jemaat->delete();

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus.');
    }
}
