<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-4">Detail Tim</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Tim: <?php echo e($tim->nama_tim); ?></h5>
                <p><strong>Liga:</strong> <?php echo e($tim->liga->nama_liga ?? 'Tidak Diketahui'); ?></p>
                <p><strong>Kota:</strong> <?php echo e($tim->kota); ?></p>
                <p><strong>Tahun Berdiri:</strong> <?php echo e($tim->tahun_berdiri); ?></p>
            </div>

            <div class="card-footer">
                <a href="<?php echo e(route('tim.index')); ?>" class="btn btn-secondary">Kembali ke Daftar Tim</a>
                <a href="<?php echo e(route('tim.edit', $tim->id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('tim.destroy', $tim->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/tim/show.blade.php ENDPATH**/ ?>