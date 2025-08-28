<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manajemen Galeri') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Media Galeri</h5>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-2"></i>Tambah Media
            </a>
        </div>

        @if($galeris->count() > 0)
            <div class="row g-4">
                @foreach($galeris as $galeri)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            @if($galeri->tipe == 'gambar')
                                <img src="{{ asset('storage/galeri/' . $galeri->file) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 200px; object-fit: cover;">
                            @elseif($galeri->tipe == 'video')
                                <video class="card-img-top" style="height: 200px; background-color: #000;" controls>
                                    <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $galeri->judul }}</h5>
                                <p class="card-text text-muted small">Tipe: {{ ucfirst($galeri->tipe) }}</p>
                                <div class="mt-auto d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus media ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted">Belum ada media di galeri.</p>
            </div>
        @endif

        @if ($galeris->hasPages())
            <div class="mt-4 d-flex justify-content-center">
                {{ $galeris->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
