<!--<form action="/product/store" method="POST" enctype="multipart/form-data">
    

    <input name="name" placeholder="jméno" type="text">
    <input name="model" placeholder="model" type="text">
    <input name="price" placeholder="cena" type="number">
    <input type="file" name="image">
    <textarea name="description" placeholder="popis produktu" type="text">
    </textarea>

    <button type="submit">Přidat</button>
</form>-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet">


<form action="<?php echo e(route('product_store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
<div class="container-sm">
    <div class="form-group">
        <label for="exampleFormControlInput1">Jméno</label>
        <input name="name" type="text" class="form-control" placeholder="" required>
    </div>

    <br>

    <div class="form-group">
        <label for="exampleFormControlInput1">Model</label>
        <input name="model" type="text" class="form-control" placeholder="" required>
    </div>

    <br>

    <div class="form-group">
        <label for="exampleFormControlInput1">Cena</label>
        <input name="price" type="number" class="form-control-file" placeholder="" required>
    </div>

    <br><br>

    <form>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
        </div>
    </form>
    <div class="form-group">

    <br><br><br>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10" required></textarea>
    </div>
    </div>
    <div class="text-lg-right">
        <button  type="submit" class="btn btn-primary">Přidat</button>
    </div>
</div>
</form>
<?php /**PATH /root/PhpstormProjects/laravel-9-template/resources/views/admin.blade.php ENDPATH**/ ?>