<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Jemaat
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white shadow p-6 rounded mt-6">
        <a href="{{ route('jemaat.index') }}" class="inline-block mb-4 px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">
            ← Kembali
        </a>

        <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2"
                       value="{{ old('nama', $jemaat->nama) }}" required>
            </div>

            <div>
                <label class="block font-semibold">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2" rows="3" required>{{ old('alamat', $jemaat->alamat) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded p-2"
                       value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir) }}" required>
            </div>

            <div>
                <label class="block font-semibold">Status Jemaat</label>
                <select name="status" class="w-full border rounded p-2" required>
                    <option value="aktif" {{ $jemaat->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pasif" {{ $jemaat->status == 'pasif' ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="pindah" {{ $jemaat->status == 'pindah' ? 'selected' : '' }}>Pindah</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Foto Profil Sekarang</label>
                @if ($jemaat->foto)
                    <img src="{{ asset('storage/' . $jemaat->foto) }}" alt="Foto" width="120" class="rounded mb-2">
                @else
                    <p class="text-gray-500"><i>Tidak ada foto</i></p>
                @endif

                <label class="block font-semibold mt-2">Ganti Foto (opsional)</label>
                <input type="file" name="foto" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('jemaat.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
