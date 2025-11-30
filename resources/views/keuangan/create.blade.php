<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Persembahan
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('keuangan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Jemaat</label>
                <select name="jemaat_id" class="input w-full" required>
                    <option value="">-- pilih jemaat --</option>
                    @foreach($jemaat as $j)
                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="input w-full" required>
            </div>

            <div class="mb-4">
                <label>Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="input w-full" required>
            </div>

            <div class="mb-4">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="input w-full">
            </div>

            <button class="btn">Simpan</button>
            <a href="{{ route('keuangan.index') }}" class="btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
