<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Daftar Transfer</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('transfer.create')); ?>">Tambah Data Transfer</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemain</th>
                    <th>Tim Asal</th>
                    <th>Tim Tujuan</th>
                    <th>Tanggal Transfer</th>
                    <th>Biaya Transfer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($transfer->pemain->nama_pemain ?? 'Tidak Diketahui'); ?></td>
                        <td><?php echo e($transfer->timAsal->nama_tim ?? 'Tidak Diketahui'); ?></td>
                        <td><?php echo e($transfer->timTujuan->nama_tim ?? 'Tidak Diketahui'); ?></td>
                        <td><?php echo e($transfer->tanggal_transfer); ?></td>
                        <td>Rp <?php echo e(number_format($transfer->biaya_transfer, 0, ',', '.')); ?></td>
                        <td>
                            <a href="<?php echo e(route('transfer.edit', $transfer->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('transfer.destroy', $transfer->id)); ?>" method="POST"
                                style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Yakin ingin menghapus transfer ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data transfer</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/transfer/index.blade.php ENDPATH**/ ?>