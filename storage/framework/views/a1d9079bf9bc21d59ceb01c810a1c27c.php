<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Daftar Pinjaman</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('pinjam.create')); ?>">Tambah Data Pinjam</a>

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
                    <th>Tanggal Pinjam</th>
                    <th>Durasi (bulan)</th>
                    <th>Biaya Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pinjams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pinjam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($pinjam->pemain->nama_pemain ?? 'Tidak Diketahui'); ?></td>
                        <td><?php echo e($pinjam->timAsal->nama_tim ?? 'Tidak Diketahui'); ?></td>
                        <td><?php echo e($pinjam->timTujuan->nama_tim ?? 'Tidak Diketahui'); ?></td>
                        <td><?php echo e($pinjam->tanggal_pinjam); ?></td>
                        <td><?php echo e($pinjam->durasi_pinjam); ?></td>
                        <td>Rp <?php echo e(number_format($pinjam->biaya_pinjam, 0, ',', '.')); ?></td>
                        <td>
                            <a href="<?php echo e(route('pinjam.edit', $pinjam->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('pinjam.destroy', $pinjam->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Yakin ingin menghapus data pinjam ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pinjaman</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/pinjam/index.blade.php ENDPATH**/ ?>