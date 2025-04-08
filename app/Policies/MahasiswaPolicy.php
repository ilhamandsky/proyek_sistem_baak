<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Mahasiswa;

class MahasiswaPolicy
{
    /**
     * Tentukan apakah pengguna dapat melihat daftar mahasiswa.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('show-mahasiswa');
    }

    /**
     * Tentukan apakah pengguna dapat melihat mahasiswa tertentu.
     */
    public function view(User $user, Mahasiswa $mahasiswa): bool
    {
        return $user->hasPermissionTo('show-mahasiswa');
    }

    /**
     * Tentukan apakah pengguna dapat membuat mahasiswa baru.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-mahasiswa');
    }

    /**
     * Tentukan apakah pengguna dapat mengupdate mahasiswa.
     */
    public function update(User $user, Mahasiswa $mahasiswa): bool
    {
        return $user->hasPermissionTo('edit-mahasiswa');
    }

    /**
     * Tentukan apakah pengguna dapat menghapus mahasiswa.
     */
    public function delete(User $user, Mahasiswa $mahasiswa): bool
    {
        return $user->hasPermissionTo('delete-mahasiswa');
    }
}
