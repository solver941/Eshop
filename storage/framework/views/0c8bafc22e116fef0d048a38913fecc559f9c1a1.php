<!--<form action="/product//update" method="POST" enctype="multipart/form-data">
    
    

    <input name="name" placeholder="jméno" type="text" value=>
    <input name="model" placeholder="model" type="text" value=>
    <input name="price" placeholder="cena" type="number" value=>
    <input type="file" name="image" value=}>

    <textarea name="description" placeholder="popis produktu" type="text">
    </textarea>

    <button type="submit">Update</button>
</form>-->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet">


<form action="/product/<?php echo e($id); ?>/update" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PATCH"); ?>
    <div class="container-sm">
        <div class="form-group">
            <label for="exampleFormControlInput1">Jméno</label>
            <input name="name" type="text" class="form-control" placeholder="" value=<?php echo e($name); ?> required>
        </div>

        <br>

        <div class="form-group">
            <label for="exampleFormControlInput1">Model</label>
            <input name="model" type="text" class="form-control" placeholder="" value=<?php echo e($model); ?> required>
        </div>

        <br>

        <div class="form-group">
            <label for="exampleFormControlInput1">Cena</label>
            <input name="price" type="number" class="form-control-file" placeholder="" value=<?php echo e($cena); ?> required>
        </div>

        <br><br>

        <form>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" value=<?php echo e($image); ?> required>
            </div>
        </form>
        <div class="form-group">

            <br><br><br>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Popis produktu</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10" required><?php echo e($description); ?></textarea>
            </div>
        </div>
        <div class="text-lg-right">
            <button  type="submit" class="btn btn-primary">Přidat</button>
        </div>
    </div>
</form>
<?php /**PATH /root/PhpstormProjects/laravel-9-template/resources/views/edit.blade.php ENDPATH**/ ?>