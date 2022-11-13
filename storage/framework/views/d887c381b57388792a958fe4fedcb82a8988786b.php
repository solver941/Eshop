<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-shop</title>
    <link href="/css/positions.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<nav class="navbar navbar-light bg-light">
    <h1>Welcome Admin!</h1>
    <!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">-->
    <?php if(Route::has('login')): ?>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <?php if(auth()->guard()->check()): ?>
                <a href="/admin" id="corner" class="corner">Přidat</a>
                <br>

<!--                <form method="POST" enctype="multipart/form-data">
                    
                    <a href="" class="text-sm text-gray-500 underline">Logout</a>
                </form>-->
<!--                <a href="" class="text-sm text-gray-500 underline">Logout</a>-->
                <form action="/home_page" method="get">
                    <button name="foo" value="logout">Logout</button>
                </form>


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
<?php echo $__env->yieldContent("content"); ?>


<?php /**PATH /root/PhpstormProjects/laravel-9-template/resources/views/layouts/admin_layout.blade.php ENDPATH**/ ?>