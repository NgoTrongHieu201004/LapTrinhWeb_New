<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: white;
        }
        .content {
            flex: 1;
        }
        .footer {
            position: relative;
            width: 100%;
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container d-flex justify-content-center">
            <div class="navbar-nav">
                <?php if(auth()->guard()->guest()): ?>
                <a class="nav-link px-3" href="<?php echo e(route('user.list')); ?>">Home</a>
                <span class="nav-link">|</span>
                <a class="nav-link px-3" href="<?php echo e(route('login')); ?>">Đăng Nhập</a>
                <span class="nav-link">|</span>
                <a class="nav-link px-3" href="<?php echo e(route('user.createUser')); ?>">Đăng Ký</a>
                <?php else: ?>
                <a class="nav-link px-3" href="<?php echo e(route('user.list')); ?>">Trang Chủ</a>
                <span class="nav-link">|</span>
                <a class="nav-link px-3" href="<?php echo e(route('login')); ?>">Đăng Nhập</a>
                <span class="nav-link">|</span>
                <a class="nav-link px-3" href="<?php echo e(route('signout')); ?>">Đăng Xuất</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
    <footer class="bg-white text-dark text-center py-3 mt-5 footer">
        <p class="mb-0">Lập Trình Web @01/2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\LapTrinhWeb_New\example-app\resources\views/dashboard.blade.php ENDPATH**/ ?>