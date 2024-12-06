<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-4">Detail Liga</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Liga: <?php echo e($liga->nama_liga); ?></h5>
                <p><strong>Negara:</strong> <?php echo e($liga->negara); ?></p>
                <p><strong>Jumlah Tim:</strong> <?php echo e($liga->jumlah_tim); ?></p>
            </div>

            <div class="card-footer">
                <a href="<?php echo e(route('liga.index')); ?>" class="btn btn-secondary">Kembali ke Daftar Liga</a>
                <a href="<?php echo e(route('liga.edit', $liga->id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('liga.destroy', $liga->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/liga/show.blade.php ENDPATH**/ ?>