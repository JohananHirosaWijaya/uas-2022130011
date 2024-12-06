<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="my-4">Detail Manajer</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama: <?php echo e($manajer->nama); ?></h5>
                <p><strong>Tim:</strong> <?php echo e($manajer->tim->nama_tim ?? 'Tidak Diketahui'); ?></p>
                <p><strong>Umur:</strong> <?php echo e($manajer->umur); ?> tahun</p>
                <p><strong>Pengalaman:</strong> <?php echo e($manajer->pengalaman); ?> tahun</p>
            </div>

            <div class="card-footer">
                <a href="<?php echo e(route('manajer.index')); ?>" class="btn btn-secondary">Kembali ke Daftar Manajer</a>
                <a href="<?php echo e(route('manajer.edit', $manajer->id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('manajer.destroy', $manajer->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/manajer/show.blade.php ENDPATH**/ ?>