<?php $__env->startSection("content"); ?>
<html><body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<div class="container-fluid">
<div class="row bd-highlight">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="p-2 col-sm-3 bd-highlight">
            
            
            <img src="<?php echo e(asset("/storage/images/" . $product->image)); ?>" height="300" width="400" alt="Image is not available">
            <p class="text-lg-center"><a href="/product/<?php echo e($product->id); ?>/show" class="caption"> <?php echo e($product->name); ?> <?php echo e($product->model); ?></a></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div></div>

</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.main_layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /root/PhpstormProjects/laravel-9-template/resources/views/home_page.blade.php ENDPATH**/ ?>