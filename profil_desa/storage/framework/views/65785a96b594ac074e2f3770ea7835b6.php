<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-white leading-tight">
            <?php echo e(__('Pengaturan Halaman Landing Page')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="row g-4">
        <!-- Section: Sambutan -->
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4">Sambutan Kepala Desa</h5>
                    <form action="<?php echo e(route('admin.sambutan.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_kepala_desa" class="form-label">Nama Kepala Desa</label>
                            <input type="text" name="nama_kepala_desa" id="nama_kepala_desa" class="form-control" value="<?php echo e(old('nama_kepala_desa', $sambutan->nama_kepala_desa ?? '')); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sambutan" class="form-label">Sambutan</label>
                            <textarea name="sambutan" id="sambutan" rows="6" class="form-control"><?php echo e(old('sambutan', $sambutan->sambutan ?? '')); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Kepala Desa</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <?php if(!empty($sambutan->foto)): ?>
                                <div class="mt-2">
                                    <p class="form-text">Foto saat ini:</p>
                                    <img src="<?php echo e(asset('storage/' . $sambutan->foto)); ?>" class="img-thumbnail" width="150" alt="Foto Kepala Desa">
                                </div>
                            <?php endif; ?>
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
                    <form action="<?php echo e(route('admin.info.storeOrUpdate')); ?>" method="POST" class="mb-4">
                        <?php echo csrf_field(); ?>
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
                                <?php $__empty_1 = true; $__currentLoopData = $infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td id="info-text-<?php echo e($info->id); ?>"><?php echo e($info->sekilas_info); ?></td>
                                        <td class="text-center">
                                            <button onclick="editInfo(<?php echo e($info->id); ?>)" class="btn btn-sm btn-warning me-2">Edit</button>
                                            <form action="<?php echo e(route('admin.info.destroy', $info->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus info ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Belum ada info.</td>
                                    </tr>
                                <?php endif; ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Jopu\Downloads\profil_desa\profil_desa\resources\views/admin/datalandingpage.blade.php ENDPATH**/ ?>