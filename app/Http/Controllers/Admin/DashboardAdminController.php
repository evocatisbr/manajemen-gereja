<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Carbon\Carbon;
use DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $year = now()->year;

        $pemasukanPerBulan = Keuangan::select(
            DB::raw('MONTH(tanggal) as bulan'),
            DB::raw('SUM(jumlah) as total')
        )
        ->whereYear('tanggal', $year)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan');

        // Data untuk Chart (bulan 1 – 12)
        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->translatedFormat('F');
            $data[] = $pemasukanPerBulan[$i] ?? 0;
        }

        return view('admin.dashboard', compact('labels', 'data', 'year'));
    }
}
