<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Pengaturan Halaman Landing Page') }}
        </h2>
    </x-slot>

    <div class="row g-4">
        <!-- Section: Sambutan -->
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4">Sambutan Kepala Desa</h5>
                    <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kepala_desa" class="form-label">Nama Kepala Desa</label>
                            <input type="text" name="nama_kepala_desa" id="nama_kepala_desa" class="form-control" value="{{ old('nama_kepala_desa', $sambutan->nama_kepala_desa ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="sambutan" class="form-label">Sambutan</label>
                            <textarea name="sambutan" id="sambutan" rows="6" class="form-control">{{ old('sambutan', $sambutan->sambutan ?? '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Kepala Desa</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            @if (!empty($sambutan->foto))
                                <div class="mt-2">
                                    <p class="form-text">Foto saat ini:</p>
                                    <img src="{{ asset('storage/' . $sambutan->foto) }}" class="img-thumbnail" width="150" alt="Foto Kepala Desa">
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Simpan Sambutan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Section: Sekilas Info -->
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4">Sekilas Info</h5>
                    <form action="{{ route('admin.info.storeOrUpdate') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-info" class="form-label">Teks Info Berjalan</label>
                            <textarea name="sekilas_info" id="edit-info" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Simpan Info</button>
                        </div>
                    </form>

                    <h6 class="card-subtitle mb-2 text-muted">Daftar Info Saat Ini</h6>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Teks Info</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($infos as $info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td id="info-text-{{ $info->id }}">{{ $info->sekilas_info }}</td>
                                        <td class="text-center">
                                            <button onclick="editInfo({{ $info->id }})" class="btn btn-sm btn-warning me-2">Edit</button>
                                            <form action="{{ route('admin.info.destroy', $info->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus info ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Belum ada info.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editInfo(id) {
            const infoText = document.getElementById('info-text-' + id).innerText;
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-info').value = infoText.trim();
            document.getElementById('edit-info').focus();
        }
    </script>
</x-app-layout>
