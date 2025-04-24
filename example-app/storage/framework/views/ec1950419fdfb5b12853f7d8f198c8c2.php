<?php $__env->startSection('content'); ?>
    <main class="login-form">
        <div class="container mt-5 content">
            <h3 class="text-center">Danh Sách User</h3>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Eamil</th>
                        <th>Role</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('user.role', ['id' => $role->id])); ?>">
                                            <?php echo e($role->name . '-'); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            <td>
                                <a href="<?php echo e(route('user.readUser', ['id' => $user->id])); ?>" class="btn btn-info btn-sm">View</a>
                                <a href="<?php echo e(route('user.updateUser', ['id' => $user->id])); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?php echo e(route('user.deleteUser', ['id' => $user->id])); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $users->withQueryString()->links('pagination::bootstrap-5'); ?>

        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LapTrinhWeb_New\example-app\resources\views/crud_user/list.blade.php ENDPATH**/ ?>