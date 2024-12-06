<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2 class="my-4">Daftar Liga</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('liga.create')); ?>">Tambah Liga Baru</a>

        <?php if($ligas->isEmpty()): ?>
            <p>Tidak ada data liga yang tersedia.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Liga</th>
                        <th>Negara</th>
                        <th>Jumlah Tim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $ligas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $liga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($liga->nama_liga); ?></td>
                            <td><?php echo e($liga->negara); ?></td>
                            <td><?php echo e($liga->jumlah_tim); ?></td>
                            <td>
                                <a href="<?php echo e(route('liga.show', $liga->id)); ?>" class="btn btn-info">Lihat</a>
                                <a href="<?php echo e(route('liga.edit', $liga->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('liga.destroy', $liga->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/liga/index.blade.php ENDPATH**/ ?>