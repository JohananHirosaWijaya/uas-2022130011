<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2 class="my-4">Daftar Pemain</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('pemain.create')); ?>">Tambah Pemain Baru</a>

        <?php if($pemains->isEmpty()): ?>
            <p>Tidak ada data pemain yang tersedia.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pemain</th>
                        <th>Tim</th>
                        <th>Posisi</th>
                        <th>Umur</th>
                        <th>Kebangsaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pemains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pemain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($pemain->nama_pemain); ?></td>
                            <td><?php echo e($pemain->tim->nama_tim ?? 'Tidak Diketahui'); ?></td>
                            <td><?php echo e($pemain->posisi); ?></td>
                            <td><?php echo e($pemain->umur); ?></td>
                            <td><?php echo e($pemain->kebangsaan); ?></td>
                            <td>
                                <a href="<?php echo e(route('pemain.show', $pemain->id)); ?>" class="btn btn-info">Lihat</a>
                                <a href="<?php echo e(route('pemain.edit', $pemain->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('pemain.destroy', $pemain->id)); ?>" method="POST"
                                    style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/pemain/index.blade.php ENDPATH**/ ?>