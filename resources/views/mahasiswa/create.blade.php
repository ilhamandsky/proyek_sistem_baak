@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Tambah Mahasiswa
            </h2>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @include('mahasiswa.form')
            </form>
        </div>
    </div>
@endsection
