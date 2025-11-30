<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Persembahan / Keuangan
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <a href="{{ route('keuangan.create') }}" class="btn mb-4">Tambah Persembahan</a>

        @if(session('success'))
            <div class="bg-green-100 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Jemaat</th>
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Jumlah</th>
                    <th class="p-2">Keterangan</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keuangan as $k)
                <tr>
                    <td class="p-2">{{ $k->jemaat->nama }}</td>
                    <td class="p-2">{{ $k->tanggal }}</td>
                    <td class="p-2">Rp {{ number_format($k->jumlah, 0, ',', '.') }}</td>
                    <td class="p-2">{{ $k->keterangan }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('keuangan.edit', $k) }}" class="btn">Edit</a>
                        <form action="{{ route('keuangan.destroy', $k) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $keuangan->links() }}
        </div>
    </div>
</x-app-layout>
