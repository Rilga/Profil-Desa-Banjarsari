<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Media Galeri') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <h5 class="card-title mb-4">Formulir Edit Media</h5>

        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Media</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Media Saat Ini</label>
                <div class="mb-2">
                    @if($galeri->tipe == 'gambar')
                        <img src="{{ asset('storage/galeri/' . $galeri->file) }}" class="img-thumbnail" alt="{{ $galeri->judul }}" style="max-height: 200px;">
                    @elseif($galeri->tipe == 'video')
                        <video style="max-height: 200px; background-color: #000;" controls>
                            <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Ganti File (Opsional)</label>
                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept="image/*,video/mp4">
                <div class="form-text">Biarkan kosong jika tidak ingin mengganti file.</div>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.galeri') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Update Media</button>
            </div>
        </form>
    </div>
</x-app-layout>
