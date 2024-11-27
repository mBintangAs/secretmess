<?php $__env->startSection('content'); ?>
    <div class="wrapper">
        <!--sidebar wrapper -->
       <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--end sidebar wrapper -->
        <!--start header -->
       <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bintang/Dokumen/PHP/secretmess/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>