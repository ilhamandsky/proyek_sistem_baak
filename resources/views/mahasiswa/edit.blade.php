@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5h2m-1 0v14m-7-7h14" />
                </svg>
                Edit Mahasiswa
            </h2>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="space-y-6" id="form-mahasiswa">
                @csrf
                @method('PUT')
                @php($edit = true)
                @include('mahasiswa.form')
            </form>
        </div>
    </div>
@endsection
