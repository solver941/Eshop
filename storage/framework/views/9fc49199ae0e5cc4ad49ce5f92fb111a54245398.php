<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-light bg-light">
    <h1>Welcome Admin!</h1>
<!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">-->
    <?php if(Route::has('login')): ?>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <?php if(auth()->guard()->check()): ?>
                <a href="/admin" id="corner" class="corner">Přidat</a>
                <br>
                <a href="<?php echo e(url('/home_page')); ?>" class="text-sm text-gray-500 underline">Logout</a>

                <!--                <a href="/admin" id="corner" class="corner">Přidat</a>-->
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-500 underline">Login</a>

                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-500 underline">Register</a>
                <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
        </div>
</nav>

        <div class="row bd-highlight">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p-2 col-sm-3 bd-highlight">
                    <img src="<?php echo e(asset("images/" . $product->image)); ?>" height="300" width="400" alt="Image is not available">
                    <div class="text-center"><a href="/product/<?php echo e($product->id); ?>/show" class="caption"> <?php echo e($product->name); ?> <?php echo e($product->model); ?></a></div>
                    <a href="/product/<?php echo e($product->id); ?>/delete" class="text-sm text-gray-500 underline">Delete</a>
                    <a href="/product/<?php echo e($product->id); ?>/edit" class="text-sm text-gray-500 underline">Edit</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

</body>
<?php /**PATH /root/PhpstormProjects/laravel-9-template/resources/views/admin_home_page.blade.php ENDPATH**/ ?>