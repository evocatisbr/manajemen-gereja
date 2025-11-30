<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 py-6 px-4 rounded-xl shadow-sm">
            <h1 class="text-4xl font-bold text-center text-blue-900">Gereja HKI Agape</h1>
            <p class="text-center text-blue-600 mt-2 text-lg">Selamat Datang di Situs Resmi Gereja</p>
        </div>
    </x-slot>

    <!-- Banner / Hero Section -->
    <div class="relative bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600 text-white py-20 px-6 text-center rounded-2xl shadow-2xl mb-12 overflow-hidden">
        <div class="absolute inset-0 bg-white opacity-10 bg-[radial-gradient(circle_at_50%_50%,rgba(255,255,255,0.3),transparent_50%)]"></div>
        <div class="relative z-10">
            <h2 class="text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Shout His Glory!</h2>
            <p class="text-xl md:text-2xl max-w-2xl mx-auto leading-relaxed mb-6">Bergabunglah bersama kami dalam ibadah dan kegiatan rohani yang membangun iman.</p>
            <a href="#jadwal-ibadah" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-bold text-lg hover:bg-blue-50 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                Lihat Jadwal Ibadah
            </a>
        </div>
    </div>

    <!-- Tentang Gereja -->
    <section class="mb-12 px-4">
        <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-blue-400">
            <h3 class="text-3xl font-bold mb-6 text-blue-900 flex items-center">
                <svg class="w-8 h-8 mr-3 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
                Tentang Gereja Kami
            </h3>
            <p class="text-gray-700 leading-relaxed text-lg">
                Gereja HKI Agape berdedikasi untuk melayani jemaat dengan kasih Kristus melalui ibadah, pendidikan, dan pelayanan sosial.
                Kami membuka tangan untuk semua yang ingin mengalami kehadiran Tuhan bersama komunitas yang ramah dan penuh kasih.
            </p>
        </div>
    </section>

    <!-- Jadwal Ibadah -->
    <section id="jadwal-ibadah" class="mb-12 px-4">
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-lg p-8 border-l-4 border-blue-500">
            <h3 class="text-3xl font-bold mb-6 text-blue-900 flex items-center">
                <svg class="w-8 h-8 mr-3 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                Jadwal Ibadah
            </h3>
            <div class="space-y-4">
                <div class="flex items-start p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900 text-lg">Minggu Pagi</h4>
                        <p class="text-gray-600">08.00 - 10.00 WIB</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900 text-lg">Minggu Sore</h4>
                        <p class="text-gray-600">17.00 - 19.00 WIB</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900 text-lg">Rabu Doa</h4>
                        <p class="text-gray-600">19.00 - 20.30 WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita / Pengumuman -->
    <section class="mb-12 px-4">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h3 class="text-3xl font-bold mb-6 text-blue-900 flex items-center">
                <svg class="w-8 h-8 mr-3 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                </svg>
                Berita & Pengumuman
            </h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-blue-500">
                    <h4 class="font-bold text-xl text-blue-900 mb-3">Perayaan Natal 2025</h4>
                    <p class="text-gray-700 leading-relaxed">Bergabunglah dengan kami dalam perayaan Natal yang meriah, penuh lagu pujian dan sukacita.</p>
                </div>
                <div class="p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-l-4 border-blue-500">
                    <h4 class="font-bold text-xl text-blue-900 mb-3">Pelayanan Sosial Bulanan</h4>
                    <p class="text-gray-700 leading-relaxed">Kami mengajak jemaat untuk ikut berpartisipasi dalam kegiatan sosial dan bakti sosial komunitas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="mb-8 px-4">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-2xl shadow-2xl p-8">
            <h3 class="text-3xl font-bold mb-6 flex items-center">
                <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
                Kontak Kami
            </h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-lg">Jl. Contoh No.123, Kota Contoh</p>
                </div>
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <p class="text-lg">(021) 1234567</p>
                </div>
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <p class="text-lg">info@gerejahkiagape.org</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
