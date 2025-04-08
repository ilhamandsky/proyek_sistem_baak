<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Membuat Permission
        $permissions = [
            'create-mahasiswa',
            'edit-mahasiswa',
            'delete-mahasiswa',
            'show-mahasiswa'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Membuat Role
        $adminBaak = Role::firstOrCreate(['name' => 'admin baak']);
        $adminKeuangan = Role::firstOrCreate(['name' => 'admin keuangan']);
        $mahasiswa = Role::firstOrCreate(['name' => 'mahasiswa']);

        // Assign Permission ke Role
        $adminBaak->givePermissionTo(['create-mahasiswa', 'edit-mahasiswa', 'delete-mahasiswa', 'show-mahasiswa']);
        $adminKeuangan->givePermissionTo(['show-mahasiswa']);
        $mahasiswa->givePermissionTo(['edit-mahasiswa', 'show-mahasiswa']);

        // Membuat User
        $users = [
            ['name' => 'Nia Kurnia Sari', 'email' => 'adminbaak@example.com', 'role' => 'admin baak'],
            ['name' => 'Devan Putra Permana', 'email' => 'adminkeuangan@example.com', 'role' => 'admin keuangan'],
            ['name' => 'Mahasiswa', 'email' => 'mahasiswa@example.com', 'role' => 'mahasiswa'],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                ['name' => $userData['name'], 'password' => bcrypt('password')]
            );

            $user->assignRole($userData['role']);
        }
    }
}
