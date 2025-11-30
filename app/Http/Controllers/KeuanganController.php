<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangan = Keuangan::with('jemaat')->latest()->paginate(10);
        return view('keuangan.index', compact('keuangan'));
    }

    public function create()
    {
        $jemaat = Jemaat::orderBy('nama')->get();
        return view('keuangan.create', compact('jemaat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jemaat_id' => 'required|exists:jemaat,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        Keuangan::create($request->all());

        return redirect()->route('keuangan.index')->with('success', 'Data persembahan berhasil ditambahkan');
    }

    public function edit(Keuangan $keuangan)
    {
        $jemaat = Jemaat::orderBy('nama')->get();
        return view('keuangan.edit', compact('keuangan', 'jemaat'));
    }

    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'jemaat_id' => 'required|exists:jemaat,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        $keuangan->update($request->all());

        return redirect()->route('keuangan.index')->with('success', 'Data persembahan berhasil diperbarui');
    }

    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('keuangan.index')->with('success', 'Data persembahan berhasil dihapus');
    }



public function rekap(Request $request)
{
    $filter = $request->query('filter', 'bulanan');

    switch ($filter) {
        case 'mingguan':
            $data = Keuangan::select(
                        DB::raw('YEAR(tanggal) as tahun'),
                        DB::raw('WEEK(tanggal) as minggu'),
                        DB::raw('SUM(jumlah) as total')
                    )
                    ->groupBy('tahun','minggu')
                    ->orderByDesc('tahun')
                    ->orderByDesc('minggu')
                    ->paginate(10);
            break;

        case 'tahunan':
            $data = Keuangan::select(
                        DB::raw('YEAR(tanggal) as tahun'),
                        DB::raw('SUM(jumlah) as total')
                    )
                    ->groupBy('tahun')
                    ->orderByDesc('tahun')
                    ->paginate(10);
            break;

        default: // bulanan
            $data = Keuangan::select(
                        DB::raw('YEAR(tanggal) as tahun'),
                        DB::raw('MONTH(tanggal) as bulan'),
                        DB::raw('SUM(jumlah) as total')
                    )
                    ->groupBy('tahun','bulan')
                    ->orderByDesc('tahun')
                    ->orderByDesc('bulan')
                    ->paginate(10);
    }

    return view('keuangan.rekap', compact('data', 'filter'));
}

}
