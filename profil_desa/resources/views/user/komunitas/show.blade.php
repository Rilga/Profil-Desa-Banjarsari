<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('user.komunitas') }}"
           class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Kembali ke Daftar Konten</a>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ asset('storage/'.$konten->cover) }}" alt="Cover" class="w-full h-64 object-cover">

            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $konten->judul }}</h1>

                <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.121 17.804A13.937 13.937 0 0112 15c2.761 0 5.304.842 7.379 2.273M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $konten->user->name ?? 'User Tidak Diketahui' }}</span>
                    </div>

                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        </svg>
                        <span>{{ $konten->created_at->translatedFormat('d F Y') }}</span>
                    </div>

                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $konten->dibaca ?? 0 }} kali dibaca</span>
                    </div>
                </div>

                <div class="prose max-w-none mb-6">
                    {!! nl2br(e($konten->deskripsi)) !!}
                </div>

                @if($konten->gambar && count(json_decode($konten->gambar, true)) > 0)
                    <div class="mt-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Gambar Tambahan</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach(json_decode($konten->gambar, true) as $gambar)
                                <img src="{{ asset('storage/'.$gambar) }}" alt="Gambar Tambahan"
                                     class="w-full h-40 object-cover rounded-lg shadow">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
