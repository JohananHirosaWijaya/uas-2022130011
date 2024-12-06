<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-4">Edit Liga</h2>

        <form action="<?php echo e(route('liga.update', $liga->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nama_liga" class="form-label">Nama Liga</label>
                <input type="text" class="form-control" id="nama_liga" name="nama_liga"
                    value="<?php echo e(old('nama_liga', $liga->nama_liga)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="negara" class="form-label">Negara</label>
                <input type="text" class="form-control" id="negara" name="negara"
                    value="<?php echo e(old('negara', $liga->negara)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_tim" class="form-label">Jumlah Tim</label>
                <input type="number" class="form-control" id="jumlah_tim" name="jumlah_tim"
                    value="<?php echo e(old('jumlah_tim', $liga->jumlah_tim)); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?php echo e(route('liga.index')); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/liga/edit.blade.php ENDPATH**/ ?>