<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Jemaat
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white shadow p-6 rounded">
        <div class="flex gap-3 mb-4">
            <a href="{{ route('jemaat.index') }}" class="inline-block px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">← Kembali</a>
            <a href="{{ route('jemaat.edit', $jemaat->id) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">✏ Edit</a>

            <form action="{{ route('jemaat.destroy', $jemaat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus jemaat ini?')">
                @csrf
                @method('DELETE')
                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">🗑 Hapus</button>
            </form>
        </div>

        <div class="flex gap-6">
            <div class="w-40 h-40 flex-shrink-0">
                @if ($jemaat->foto)
                    <img src="{{ asset('storage/' . $jemaat->foto) }}" alt="Foto {{ $jemaat->nama }}" class="w-40 h-40 object-cover rounded-lg">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($jemaat->nama) }}&background=ccc&color=fff&size=160" alt="Avatar" class="w-40 h-40 rounded-lg">
                @endif
            </div>

            <div class="flex-1">
                <p class="mb-1"><span class="font-semibold">Nama:</span> {{ $jemaat->nama }}</p>
                <p class="mb-1"><span class="font-semibold">NIK:</span> {{ $jemaat->nik ?? '-' }}</p>
                <p class="mb-1"><span class="font-semibold">Email:</span> {{ $jemaat->email ?? '-' }}</p>
                <p class="mb-1"><span class="font-semibold">Tanggal Lahir:</span> {{ optional($jemaat->tanggal_lahir)->format('d M Y') ?? '-' }}</p>
                <p class="mb-1"><span class="font-semibold">Alamat:</span> {{ $jemaat->alamat ?? '-' }}</p>
                <p class="mb-1"><span class="font-semibold">Status:</span> <span class="capitalize">{{ $jemaat->status }}</span></p>

                <div class="mt-4 text-sm text-gray-600">
                    <p><strong>Dibuat pada:</strong> {{ optional($jemaat->created_at)->format('d M Y H:i') ?? '-' }}</p>
                    <p><strong>Diperbarui:</strong> {{ optional($jemaat->updated_at)->format('d M Y H:i') ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
