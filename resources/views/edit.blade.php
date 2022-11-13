<!--<form action="/product/{{--{{$id}}--}}/update" method="POST" enctype="multipart/form-data">
    {{--@csrf--}}
    {{--@method("PATCH")--}}

    <input name="name" placeholder="jméno" type="text" value={{--{{$name}}--}}>
    <input name="model" placeholder="model" type="text" value={{--{{$model}}--}}>
    <input name="price" placeholder="cena" type="number" value={{--{{$cena}}--}}>
    <input type="file" name="image" value={{--{{$image}--}}}>

    <textarea name="description" placeholder="popis produktu" type="text">{{--{{$description}}--}}
    </textarea>

    <button type="submit">Update</button>
</form>-->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href="css/positions.css" rel="stylesheet">


<form action="/product/{{$id}}/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="container-sm">
        <div class="form-group">
            <label for="exampleFormControlInput1">Jméno</label>
            <input name="name" type="text" class="form-control" placeholder="" value={{$product->name}} required>
        </div>
y
        <br>

        <div class="form-group">
            <label for="exampleFormControlInput1">Model</label>
            <input name="model" type="text" class="form-control" placeholder="" value={{$product->model}} required>
        </div>

        <br>

        <div class="form-group">
            <label for="exampleFormControlInput1">Cena</label>
            <input name="price" type="number" class="form-control-file" placeholder="" value={{$product->price}} required>
        </div>

        <br><br>

        <form>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" value={{$product->image}} required>
            </div>
        </form>
        <div class="form-group">

            <br><br><br>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Popis produktu</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="10" required>{{$product->description}}</textarea>
            </div>
        </div>
        <div class="text-lg-right">
            <button  type="submit" class="btn btn-primary">Přidat</button>
        </div>
    </div>
</form>
