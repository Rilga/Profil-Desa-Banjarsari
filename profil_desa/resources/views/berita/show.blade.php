@extends('layouts.landing')

@section('content')
<style>
    html, body {
        font-family: 'Poppins', sans-serif;
        background-color: #ecf2ea;
    }
</style>

<section class="pt-24 pb-16 bg-green-50">
    <div class="max-w-4xl mx-auto px-6">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mb-6">
            ← Kembali ke daftar berita
        </a>


        <h1 class="text-3xl sm:text-4xl font-bold text-green-900 mb-4">{{ $kontens->judul }}</h1>
        <div class="text-sm text-gray-600 mb-6 flex gap-4 flex-wrap">
            <span><i class="bx bx-calendar"></i> {{ $kontens->created_at->format('d M Y') }}</span>
            <span><i class="bx bx-user"></i> {{ $kontens->user->name ?? 'User' }}</span>
            <span><i class="bx bx-show"></i> {{ $kontens->dibaca }}x dibaca</span>
        </div>

        <img src="{{ asset('storage/' . $kontens->cover) }}" class="rounded w-full max-h-[500px] object-cover mb-6">

        <div class="text-gray-800 text-lg leading-relaxed space-y-4">
            {!! nl2br(e($kontens->deskripsi)) !!}
        </div>

        @php
            $gambarTambahan = is_string($kontens->gambar)
                ? json_decode($kontens->gambar, true)
                : $kontens->gambar;

            $gambarTambahan = is_array($gambarTambahan) ? $gambarTambahan : [];
        @endphp

        @if (count($gambarTambahan))
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Gambar Tambahan</h2>
                <div class="flex flex-wrap gap-4">
                    @foreach ($gambarTambahan as $g)
                        <img src="{{ asset('storage/' . $g) }}" class="w-40 h-40 object-cover rounded">
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
