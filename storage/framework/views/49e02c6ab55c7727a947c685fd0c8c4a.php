<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2 class="my-4">Daftar Tim</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('tim.create')); ?>">Tambah Tim Baru</a>

        <?php if($tims->isEmpty()): ?>
            <p>Tidak ada data tim yang tersedia.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tim</th>
                        <th>Liga</th>
                        <th>Kota</th>
                        <th>Tahun Berdiri</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($tim->nama_tim); ?></td>
                            <td><?php echo e($tim->liga->nama_liga ?? 'Tidak Diketahui'); ?></td>
                            <td><?php echo e($tim->kota); ?></td>
                            <td><?php echo e($tim->tahun_berdiri); ?></td>
                            <td>
                                <a href="<?php echo e(route('tim.show', $tim->id)); ?>" class="btn btn-info">Lihat</a>
                                <a href="<?php echo e(route('tim.edit', $tim->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('tim.destroy', $tim->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/tim/index.blade.php ENDPATH**/ ?>