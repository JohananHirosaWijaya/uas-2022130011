<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Pinjaman</h1>
        <form action="<?php echo e(route('pinjam.update', $pinjam->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="id_pemain">Pemain</label>
                <select name="id_pemain" class="form-control" required>
                    <?php $__currentLoopData = $pemains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pemain->id); ?>" <?php echo e($pinjam->id_pemain == $pemain->id ? 'selected' : ''); ?>>
                            <?php echo e($pemain->nama_pemain); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_asal">Tim Asal</label>
                <select name="id_tim_asal" class="form-control" required>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tim->id); ?>" <?php echo e($pinjam->id_tim_asal == $tim->id ? 'selected' : ''); ?>>
                            <?php echo e($tim->nama_tim); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_tujuan">Tim Tujuan</label>
                <select name="id_tim_tujuan" class="form-control" required>
                    <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tim->id); ?>" <?php echo e($pinjam->id_tim_tujuan == $tim->id ? 'selected' : ''); ?>>
                            <?php echo e($tim->nama_tim); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="<?php echo e($pinjam->tanggal_pinjam); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="durasi_pinjam">Durasi Pinjam (bulan)</label>
                <input type="number" name="durasi_pinjam" class="form-control" value="<?php echo e($pinjam->durasi_pinjam); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="biaya_pinjam">Biaya Pinjam</label>
                <input type="number" name="biaya_pinjam" class="form-control" value="<?php echo e($pinjam->biaya_pinjam); ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/pinjam/edit.blade.php ENDPATH**/ ?>