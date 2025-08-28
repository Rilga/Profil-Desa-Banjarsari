<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Aparat Desa') }}
        </h2>
    </x-slot>

    <div class="card-body">
        <h5 class="card-title mb-4">Formulir Edit Aparat Desa</h5>

        <form action="{{ route('admin.aparat.update', $aparat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $aparat->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $aparat->jabatan) }}" required>
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($aparat->foto)
                    <div class="mt-3">
                        <p class="form-text">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $aparat->foto) }}" alt="Foto {{ $aparat->nama }}" class="rounded" style="width: 100px; height: auto;">
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.aparat.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
        </form>
    </div>
</x-app-layout>
