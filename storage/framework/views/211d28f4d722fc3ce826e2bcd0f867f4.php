<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Tambah Tim</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('tim.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="<?php echo e(old('nama_tim')); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="id_liga">Liga</label>
                <select class="form-control" id="id_liga" name="id_liga" required>
                    <option value="" disabled selected>Pilih Liga</option>
                    <?php $__currentLoopData = $ligas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($liga->id); ?>" <?php echo e(old('id_liga') == $liga->id ? 'selected' : ''); ?>>
                            <?php echo e($liga->nama_liga); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" value="<?php echo e(old('kota')); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="tahun_berdiri">Tahun Berdiri</label>
                <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri"
                    value="<?php echo e(old('tahun_berdiri')); ?>" min="1800" max="<?php echo e(date('Y')); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UAS-2022130011\resources\views/tim/create.blade.php ENDPATH**/ ?>