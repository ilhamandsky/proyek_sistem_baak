<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-800 leading-tight">
            Selamat Datang di SIAKMAH
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Card Ringkasan --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 shadow rounded-lg border-l-4 border-cyan-500">
                    <h3 class="text-lg font-semibold text-gray-700">Jumlah Mahasiswa</h3>
                    <p class="text-3xl font-bold mt-2 text-cyan-700">{{ $totalMahasiswa ?? '...' }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg border-l-4 border-cyan-500">
                    <h3 class="text-lg font-semibold text-gray-700">Jumlah Dosen</h3>
                    <p class="text-3xl font-bold mt-2 text-cyan-700">{{ $totalDosen ?? '...' }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg border-l-4 border-cyan-500">
                    <h3 class="text-lg font-semibold text-gray-700">Program Studi</h3>
                    <p class="text-3xl font-bold mt-2 text-cyan-700">{{ $totalProdi ?? '...' }}</p>
                </div>
            </div>

            {{-- Info atau Announcement --}}
            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Informasi Sistem</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Sistem Informasi Administrasi Akademik dan Kemahasiswaan (SIAKMAH) ini dirancang untuk membantu pengelolaan data mahasiswa, dosen, program studi, dan keperluan akademik lainnya secara efisien dan terintegrasi.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
