<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Selamat Datang, {{ Auth::user()->name }}
        </h2>
        <p class="text-sm text-gray-600">Sistem Informasi Manajemen Gereja</p>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Section: Menu Navigasi Cepat -->
            <div class="bg-white p-6 shadow rounded">
                <h3 class="font-semibold mb-4 text-lg">Navigasi Cepat</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                    <a href="{{ route('jemaat.index') }}" class="p-4 bg-blue-50 hover:bg-blue-100 rounded shadow">
                        👤 Manajemen Jemaat
                    </a>
                    <a href="{{ route('keuangan.index') }}" class="p-4 bg-green-50 hover:bg-green-100 rounded shadow">
                        💰 Manajemen Keuangan
                    </a>
                    <a href="#" class="p-4 bg-purple-50 hover:bg-purple-100 rounded shadow">
                        📅 Agenda & Kegiatan Gereja
                    </a>
                </div>
            </div>

            <!-- Section: Dashboard Grafik Keuangan -->
            <div class="bg-white p-6 shadow rounded">
                <h3 class="font-semibold mb-4 text-lg">Dashboard Keuangan {{ $year }}</h3>

                <canvas id="chartPemasukan"></canvas>
            </div>

        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('chartPemasukan').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total Pemasukan',
                    data: {!! json_encode($data) !!},
                    borderWidth: 2,
                    tension: 0.3
                }]
            }
        });
    </script>
</x-app-layout>
