<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Tambah Manajer</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('manajer.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="nama">Nama Manajer</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="id_tim">Tim</label>
                <select class="form-control" id="id_tim" name="id_tim" required>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tim->id); ?>"><?php echo e($tim->nama_tim); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" min="25" required>
            </div>

            <div class="form-group">
                <label for="pengalaman">Pengalaman (Tahun)</label>
                <input type="number" class="form-control" id="pengalaman" name="pengalaman" min="0" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/manajer/create.blade.php ENDPATH**/ ?>