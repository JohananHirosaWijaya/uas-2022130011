<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="my-4">Edit Pemain</h2>

    <form action="<?php echo e(route('pemain.update', $pemain->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="nama_pemain" class="form-label">Nama Pemain</label>
            <input type="text" class="form-control" id="nama_pemain" name="nama_pemain" value="<?php echo e(old('nama_pemain', $pemain->nama_pemain)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_tim" class="form-label">Tim</label>
            <select class="form-select" id="id_tim" name="id_tim" required>
                <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tim->id); ?>" <?php echo e($pemain->id_tim == $tim->id ? 'selected' : ''); ?>><?php echo e($tim->nama_tim); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="<?php echo e(old('posisi', $pemain->posisi)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" value="<?php echo e(old('umur', $pemain->umur)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="kebangsaan" class="form-label">Kebangsaan</label>
            <input type="text" class="form-control" id="kebangsaan" name="kebangsaan" value="<?php echo e(old('kebangsaan', $pemain->kebangsaan)); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?php echo e(route('pemain.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/pemain/edit.blade.php ENDPATH**/ ?>