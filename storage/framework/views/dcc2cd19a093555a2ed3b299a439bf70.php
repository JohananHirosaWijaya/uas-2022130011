<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-4">Edit Tim</h2>

        <form action="<?php echo e(route('tim.update', $tim->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nama_tim" class="form-label">Nama Tim</label>
                <input type="text" class="form-control" id="nama_tim" name="nama_tim"
                    value="<?php echo e(old('nama_tim', $tim->nama_tim)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_liga" class="form-label">Liga</label>
                <select class="form-select" id="id_liga" name="id_liga" required>
                    <?php $__currentLoopData = $ligas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($liga->id); ?>" <?php echo e($tim->id_liga == $liga->id ? 'selected' : ''); ?>>
                            <?php echo e($liga->nama_liga); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota"
                    value="<?php echo e(old('kota', $tim->kota)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri"
                    value="<?php echo e(old('tahun_berdiri', $tim->tahun_berdiri)); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?php echo e(route('tim.index')); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/tim/edit.blade.php ENDPATH**/ ?>