<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Jemaat
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Jemaat</h1>
            <a href="{{ route('jemaat.create') }}" class="btn">Tambah Jemaat</a>
        </div>

        {{-- search ajax --}}
        <div class="mb-4">
            <input id="search" type="text" placeholder="Cari nama / NIK / email..." class="input w-full" />
        </div>

        @if(session('success'))
            <div class="bg-green-100 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <div id="table-wrap">
            @include('jemaat._table')
        </div>

    </div>
    <script>
        let timeout = null;

        document.getElementById('search').addEventListener('input', function () {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const q = this.value;
                fetch(`{{ route('jemaat.index') }}?q=${encodeURIComponent(q)}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => document.getElementById('table-wrap').innerHTML = html);
            }, 300); // debounce 300ms
        });

        // pagination support via AJAX
        document.addEventListener('click', function(e){
            if (e.target.closest('#table-wrap .pagination a')) {
                e.preventDefault();
                const url = e.target.getAttribute('href');
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(res => res.text())
                    .then(html => document.getElementById('table-wrap').innerHTML = html);
            }
        });
        </script>

</x-app-layout>
