<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rekap Keuangan Gereja
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">

        {{-- filter --}}
        <div class="mb-4">
            <form method="GET" action="">
                <select name="filter" onchange="this.form.submit()" class="input">
                    <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                    <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                    <option value="tahunan" {{ $filter == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                </select>
            </form>
        </div>

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    @if($filter == 'mingguan')
                        <th class="p-2">Tahun</th>
                        <th class="p-2">Minggu ke</th>
                    @elseif($filter == 'bulanan')
                        <th class="p-2">Tahun</th>
                        <th class="p-2">Bulan</th>
                    @else
                        <th class="p-2">Tahun</th>
                    @endif
                    <th class="p-2">Total (Rp)</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $d)
                <tr>
                    @if($filter == 'mingguan')
                        <td class="p-2">{{ $d->tahun }}</td>
                        <td class="p-2">{{ $d->minggu }}</td>
                    @elseif($filter == 'bulanan')
                        <td class="p-2">{{ $d->tahun }}</td>
                        <td class="p-2">{{ DateTime::createFromFormat('!m', $d->bulan)->format('F') }}</td>
                    @else
                        <td class="p-2">{{ $d->tahun }}</td>
                    @endif

                    <td class="p-2 font-bold">Rp {{ number_format($d->total, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $data->links() }}</div>
    </div>
</x-app-layout>
