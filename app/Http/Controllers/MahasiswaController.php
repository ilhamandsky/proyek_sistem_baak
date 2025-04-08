<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MahasiswaController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('show-mahasiswa');

        $search = $request->input('search');

        $mahasiswas = Mahasiswa::with('user')
            ->whereHas('user', function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                }
            })
            ->orWhere('nim', 'like', "%{$search}%")
            ->orWhere('program_studi', 'like', "%{$search}%")
            ->orWhere('fakultas', 'like', "%{$search}%")
            ->latest()
            ->paginate(5);

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $this->authorize('create-mahasiswa');
        return view('mahasiswa.create'); // view ini akan include 'form.blade.php'
    }

    public function store(Request $request)
    {
        $this->authorize('create-mahasiswa');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'nim' => 'required|unique:mahasiswas,nim',
            'program_studi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'tahun_masuk' => 'required|digits:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('mahasiswa');

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'fakultas' => $request->fakultas,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $this->authorize('edit-mahasiswa');
        $edit = true; // untuk nentuin apakah form ini mode edit
        return view('mahasiswa.edit', compact('mahasiswa', 'edit'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->authorize('edit-mahasiswa');

        $user = $mahasiswa->user;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'program_studi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'tahun_masuk' => 'required|digits:4',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $mahasiswa->update([
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'fakultas' => $request->fakultas,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->authorize('delete-mahasiswa');

        $mahasiswa->user->delete(); // hapus user duluan
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
