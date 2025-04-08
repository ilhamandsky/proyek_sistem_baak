@csrf

<div class="space-y-5">

    <div>
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="name" value="{{ old('name', $mahasiswa->user->name ?? '') }}"
            class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $mahasiswa->user->email ?? '') }}"
            class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
    </div>

    @if (!isset($edit))
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password"
                class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-gray-700">NIM</label>
        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim ?? '') }}"
            class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Program Studi</label>
        <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi ?? '') }}"
            class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Fakultas</label>
        <input type="text" name="fakultas" value="{{ old('fakultas', $mahasiswa->fakultas ?? '') }}"
            class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tahun Masuk</label>
        <input type="text" name="tahun_masuk" value="{{ old('tahun_masuk', $mahasiswa->tahun_masuk ?? '') }}"
            class="mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary text-sm">
    </div>
</div>

<div class="flex justify-between items-center mt-8">
    <a href="{{ route('mahasiswa.index') }}"
        class="text-sm text-primary hover:underline hover:font-semibold transition">← Kembali</a>

    <button type="submit"
        class="inline-flex items-center px-6 py-2 bg-primary hover:bg-purple-700 text-white font-semibold rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary text-sm transition">
        Simpan
    </button>
</div>
