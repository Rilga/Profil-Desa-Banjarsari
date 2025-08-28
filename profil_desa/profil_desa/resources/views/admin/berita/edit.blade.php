<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <h5 class="card-title mb-4">Formulir Edit Berita</h5>

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cover" class="form-label">Ganti Gambar Cover (Opsional)</label>
                        <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror">
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <p class="form-text">Cover saat ini:</p>
                            <img src="{{ asset('storage/' . $berita->cover) }}" class="img-thumbnail" width="200" alt="Cover saat ini">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Tambah Gambar Lain (Opsional)</label>
                        <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar.*') is-invalid @enderror" multiple>
                        @error('gambar.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if(is_array($berita->gambar))
                            <div class="mt-2">
                                <p class="form-text">Gambar tambahan saat ini:</p>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($berita->gambar as $g)
                                        <img src="{{ asset('storage/' . $g) }}" class="img-thumbnail" width="100" alt="Gambar tambahan">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Update Berita</button>
            </div>
        </form>
    </div>
</x-app-layout>
