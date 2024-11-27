<?php $__env->startSection('content'); ?>
    <div class="wrapper bg-lock-screen">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">

                                    <p class="text-center"> Belum ada pesan nih, <?php echo e($name); ?></p>
                                   
                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
                                            <a  href="/<?php echo e($name); ?>" class="btn btn-primary"><i
                                                    class="bx bx-refresh"></i>Cek Lagi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bintang/Dokumen/PHP/secretmess/resources/views/messages/nope.blade.php ENDPATH**/ ?>