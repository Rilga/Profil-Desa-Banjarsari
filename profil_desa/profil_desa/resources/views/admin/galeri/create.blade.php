<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Media Galeri') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <h5 class="card-title mb-4">Formulir Tambah Media</h5>

        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Media</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File (Gambar atau Video)</label>
                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept="image/*,video/mp4" required>
                <div class="form-text">Upload file gambar (JPG, PNG) atau video (MP4).</div>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.galeri') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan Media</button>
            </div>
        </form>
    </div>
</x-app-layout>
