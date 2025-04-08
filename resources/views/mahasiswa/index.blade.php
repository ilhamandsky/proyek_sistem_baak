<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-700 leading-tight">🎓 Data Mahasiswa</h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl rounded-xl border border-indigo-100">

                {{-- Flash Message --}}
                @if(session('success'))
                    <div class="flash-message flex items-center bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4 animate-fade-in border border-green-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="flash-message flex items-center bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-4 animate-fade-in border border-red-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <form action="{{ route('mahasiswa.index') }}" method="GET">
                        <input type="text" name="search" placeholder="🔍 Cari mahasiswa..."
                            class="rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm w-64 shadow-md px-4 py-2">
                    </form>

                    @can('create', App\Models\Mahasiswa::class)
                        <a href="{{ route('mahasiswa.create') }}"
                            class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg shadow-md hover:opacity-90 transition font-semibold">
                            + Tambah Mahasiswa
                        </a>
                    @endcan
                </div>

                <div class="overflow-x-auto rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-800">
                        <thead class="bg-indigo-100 text-indigo-900">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">Nama</th>
                                <th class="px-6 py-3 text-left font-semibold">Email</th>
                                <th class="px-6 py-3 text-left font-semibold">NIM</th>
                                <th class="px-6 py-3 text-left font-semibold">Program Studi</th>
                                <th class="px-6 py-3 text-left font-semibold">Fakultas</th>
                                <th class="px-6 py-3 text-left font-semibold">Tahun Masuk</th>
                                <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($mahasiswas as $mhs)
                                <tr class="hover:bg-indigo-50 transition duration-150">
                                    <td class="px-6 py-4">{{ $mhs->user->name }}</td>
                                    <td class="px-6 py-4">{{ $mhs->user->email }}</td>
                                    <td class="px-6 py-4">{{ $mhs->nim }}</td>
                                    <td class="px-6 py-4">{{ $mhs->program_studi }}</td>
                                    <td class="px-6 py-4">{{ $mhs->fakultas }}</td>
                                    <td class="px-6 py-4">{{ $mhs->tahun_masuk }}</td>
                                    <td class="px-6 py-4 flex justify-center gap-3">
                                        @can('update', $mhs)
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
                                                class="text-indigo-600 hover:text-indigo-800 hover:scale-110 transition">
                                                ✏️
                                            </a>
                                        @endcan

                                        @can('delete', $mhs)
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                                class="inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 hover:scale-110 transition delete-btn">
                                                    🗑️
                                                </button>
                                            </form>
                                        @endcan

                                        @unless(Gate::allows('update', $mhs) || Gate::allows('delete', $mhs))
                                            <span class="text-gray-400">-</span>
                                        @endunless
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center px-6 py-4 text-gray-500">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $mahasiswas->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                document.querySelectorAll(".flash-message").forEach(msg => msg.style.display = "none");
            }, 5000);

            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    let form = this.closest("form");
                    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
    </style>
</x-app-layout>
