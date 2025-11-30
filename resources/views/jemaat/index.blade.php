<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-6 px-6 rounded-xl shadow-sm">
            <div class="flex items-center">
                <svg class="w-8 h-8 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                </svg>
                <h2 class="font-bold text-2xl text-blue-900">
                    Daftar Jemaat
                </h2>
            </div>
            <p class="text-blue-600 text-sm mt-1 ml-11">Manajemen data anggota jemaat</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-t-4 border-blue-400">

                <!-- Header Section -->
                <div class="p-6 bg-gradient-to-r from-blue-50 to-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800 mb-1">Data Jemaat</h1>
                            <p class="text-sm text-gray-600">Kelola informasi anggota jemaat gereja</p>
                        </div>
                        <a href="{{ route('jemaat.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                            Tambah Jemaat
                        </a>
                    </div>
                </div>

                <!-- Search Section -->
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input
                            id="search"
                            type="text"
                            placeholder="Cari nama, NIK, atau email jemaat..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm"
                        />
                        <div id="search-loading" class="hidden absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="animate-spin h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2 ml-1">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Ketik untuk mencari secara real-time
                    </p>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mx-6 mt-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <p class="font-semibold text-green-800">Berhasil!</p>
                                <p class="text-green-700 text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Table Section -->
                <div class="p-6" id="table-wrap">
                    @include('jemaat._table')
                </div>

            </div>

            <!-- Info Card -->
            <div class="mt-6 bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-blue-900 mb-1">Informasi</h4>
                        <p class="text-sm text-blue-700">
                            Data jemaat dapat dicari berdasarkan nama, NIK, atau alamat email.
                            Gunakan fitur pencarian untuk menemukan data dengan cepat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let timeout = null;
        const searchInput = document.getElementById('search');
        const searchLoading = document.getElementById('search-loading');
        const tableWrap = document.getElementById('table-wrap');

        searchInput.addEventListener('input', function () {
            clearTimeout(timeout);

            // Show loading indicator
            searchLoading.classList.remove('hidden');

            timeout = setTimeout(() => {
                const q = this.value;
                fetch(`{{ route('jemaat.index') }}?q=${encodeURIComponent(q)}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => {
                    tableWrap.innerHTML = html;
                    // Hide loading indicator
                    searchLoading.classList.add('hidden');

                    // Add fade-in animation
                    tableWrap.style.opacity = '0';
                    setTimeout(() => {
                        tableWrap.style.transition = 'opacity 0.3s';
                        tableWrap.style.opacity = '1';
                    }, 50);
                })
                .catch(err => {
                    console.error('Search error:', err);
                    searchLoading.classList.add('hidden');
                });
            }, 300); // debounce 300ms
        });

        // Pagination support via AJAX
        document.addEventListener('click', function(e){
            const paginationLink = e.target.closest('#table-wrap .pagination a');
            if (paginationLink) {
                e.preventDefault();
                const url = paginationLink.getAttribute('href');

                // Show loading state
                tableWrap.style.opacity = '0.5';

                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(res => res.text())
                    .then(html => {
                        tableWrap.innerHTML = html;
                        tableWrap.style.opacity = '1';

                        // Smooth scroll to top of table
                        tableWrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    })
                    .catch(err => {
                        console.error('Pagination error:', err);
                        tableWrap.style.opacity = '1';
                    });
            }
        });

        // Auto-hide success message after 5 seconds
        @if(session('success'))
            setTimeout(function() {
                const successMsg = document.querySelector('.bg-green-50');
                if (successMsg) {
                    successMsg.style.transition = 'opacity 0.5s';
                    successMsg.style.opacity = '0';
                    setTimeout(() => successMsg.remove(), 500);
                }
            }, 5000);
        @endif
    </script>
</x-app-layout>
