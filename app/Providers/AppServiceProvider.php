<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Mahasiswa;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('components.app-layout', 'app-layout');
        Paginator::useTailwind();

        Gate::define('create', function (User $user) {
            return $user->role === 'admin baak';
        });

        Gate::define('edit', function (User $user, Mahasiswa $mahasiswa) {
            return $user->id === $mahasiswa->user_id || $user->role === 'admin baak';
        });

        Gate::define('delete', function (User $user, Mahasiswa $mahasiswa) {
            return $user->role === 'admin baak';
        });

    }
}
