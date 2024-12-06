<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-4">Edit Manajer</h2>

        <form action="<?php echo e(route('manajer.update', $manajer->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Manajer</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="<?php echo e(old('nama', $manajer->nama)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_tim" class="form-label">Tim</label>
                <select class="form-select" id="id_tim" name="id_tim" required>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tim->id); ?>" <?php echo e($manajer->id_tim == $tim->id ? 'selected' : ''); ?>>
                            <?php echo e($tim->nama_tim); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur"
                    value="<?php echo e(old('umur', $manajer->umur)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="pengalaman" class="form-label">Pengalaman (tahun)</label>
                <input type="number" class="form-control" id="pengalaman" name="pengalaman"
                    value="<?php echo e(old('pengalaman', $manajer->pengalaman)); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?php echo e(route('manajer.index')); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/manajer/edit.blade.php ENDPATH**/ ?>