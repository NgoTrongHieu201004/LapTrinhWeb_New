<?php $__env->startSection('content'); ?>
    <main class="login-form">
    <div class="container mt-5 content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Màn Hình Chi Tiết</h3>
                        <div class="ms-5 mb-3" style=" display : none;">
                            <strong class="me-5">Id:</strong> <?php echo e($messi->id); ?>

                        </div>
                        <div class="ms-5 mb-3">
                            <strong class="me-5">Username:</strong> <?php echo e($messi->username); ?>

                        </div>
                        <div class=" ms-5 mb-3">
                            <strong class="me-5">Email:</strong> <?php echo e($messi->email); ?>

                        </div>
                        <div class="text-end">
                            <a class="btn btn-primary" href="<?php echo e(route('user.updateUser', ['id' => $messi->id])); ?>">Chỉnh Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LapTrinhWeb_New\example-app\resources\views/crud_user/read.blade.php ENDPATH**/ ?>