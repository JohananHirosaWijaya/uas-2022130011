<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2 class="my-4">Daftar Manajer</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('manajer.create')); ?>">Tambah Manajer Baru</a>

        <?php if($manajers->isEmpty()): ?>
            <p>Tidak ada data manajer yang tersedia.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Tim</th>
                        <th>Umur</th>
                        <th>Pengalaman (tahun)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $manajers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $manajer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($manajer->nama); ?></td>
                            <td><?php echo e($manajer->tim->nama_tim ?? 'Tidak Diketahui'); ?></td>
                            <td><?php echo e($manajer->umur); ?></td>
                            <td><?php echo e($manajer->pengalaman); ?></td>
                            <td>
                                <a href="<?php echo e(route('manajer.show', $manajer->id)); ?>" class="btn btn-info">Lihat</a>
                                <a href="<?php echo e(route('manajer.edit', $manajer->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('manajer.destroy', $manajer->id)); ?>" method="POST"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/manajer/index.blade.php ENDPATH**/ ?>