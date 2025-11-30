<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Jemaat
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white shadow p-6 rounded mt-6">
        <form action="{{ route('jemaat.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required
                       class="w-full border rounded p-2">
                @error('nama') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block font-semibold">NIK</label>
                <input type="text" name="nik" value="{{ old('nik') }}"
                       class="w-full border rounded p-2">
                @error('nik') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border rounded p-2">
                @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2">{{ old('alamat') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="aktif">Aktif</option>
                    <option value="pasif">Pasif</option>
                    <option value="pindah">Pindah</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Foto</label>
                <input type="file" name="foto" class="w-full">
            </div>

            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('jemaat.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
