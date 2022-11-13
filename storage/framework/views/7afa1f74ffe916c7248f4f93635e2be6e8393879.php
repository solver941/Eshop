<?php $__env->startSection("content"); ?>
<div class="container">
<h1 style="text-align: center"><?php echo e($all_from_row[0]["name"]); ?> <?php echo e($all_from_row[0]["model"]); ?></h1>
<img  width="500px" height="auto" class="rounded mx-auto d-block" src="<?php echo e(asset("storage/images/" . $product->image_path)); ?>" alt="af">
    <?php if(session("success")): ?>
        <div class="alert alert-success">
            <?php echo e(session("success")); ?>

        </div>
    <?php endif; ?>
    <div class="container"></div>


    <br>
<!--    <main role="main" class="container">
        <div  style="text-align: center" class="starter-template">
            <p class="lead"></p>
        </div>
    </main>-->
<div  style="text-align: center" class="blockquote text-center">

    <div class="h-auto d-inline-block" style="width: 600px"><?php echo e($all_from_row[0]["description"]); ?></div>
</div>

<?php echo csrf_field(); ?>
<button onclick="doSomething()" class="corner" id="test"><?php echo e($text); ?></button>
<script>
    function doSomething() {
        var x = document.getElementById("test");
        if (x.innerHTML === "Add to shopping cart") {
            x.innerHTML = "Remove from shopping cart";
            //$added_product = "Acer Nitro 5";
            sessionStorage.setItem(<?php echo e($all_from_row[0]["id"]); ?>, "True")

            $item = sessionStorage.getItem("True")
            window.location.href="/add_cart/<?php echo e($all_from_row[0]["id"]); ?>"
            //window.location.href="/add_cart///

        } else {
            x.innerHTML = "Add to shopping cart";
            window.location.href="/add_cart/<?php echo e($all_from_row[0]["id"]); ?>"
            /*if(Session::has('success'))
                <div class="alert alert-success">
                
                </div>*/

        }

    }
</script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.main_layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /root/PhpstormProjects/laravel-9-template/resources/views/products.blade.php ENDPATH**/ ?>