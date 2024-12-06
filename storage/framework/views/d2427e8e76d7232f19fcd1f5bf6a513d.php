<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Tambah Data Peminjaman Pemain</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('pinjam.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="id_pemain">Nama Pemain</label>
                <select name="id_pemain" id="id_pemain" class="form-control" required>
                    <option value="">Pilih Pemain</option>
                    <?php $__currentLoopData = $pemains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pemain->id); ?>"><?php echo e($pemain->nama_pemain); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_asal">Tim Asal</label>
                <select name="id_tim_asal" id="id_tim_asal" class="form-control" required>
                    <option value="">Pilih Tim Asal</option>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tim->id); ?>"><?php echo e($tim->nama_tim); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_tujuan">Tim Tujuan</label>
                <select name="id_tim_tujuan" id="id_tim_tujuan" class="form-control" required>
                    <option value="">Pilih Tim Tujuan</option>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tim->id); ?>"><?php echo e($tim->nama_tim); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="durasi_pinjam">Durasi Peminjaman (bulan)</label>
                <input type="number" name="durasi_pinjam" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <label for="biaya_pinjam">Biaya Peminjaman</label>
                <input type="number" name="biaya_pinjam" class="form-control" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/pinjam/create.blade.php ENDPATH**/ ?>