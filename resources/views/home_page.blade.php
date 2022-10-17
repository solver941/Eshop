<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<nav class="navbar navbar-light bg-light">
    <h1>E-shop</h1>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="/shopping_cart"><img src="shopping_cart.webp" height=100 class="corner" id="corner"></a>
                <a href="{{ url('/home') }}" class="text-sm text-gray-500 underline">Home</a>
            @else
                <a href="/shopping_cart"><img src="shopping_cart.webp" height=100 class="corner" id="corner"></a>
                <a href="{{ route('login') }}" class="text-sm text-gray-500 underline">Login</a>
                &nbsp &nbsp
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 underline">Register</a>
                    &nbsp &nbsp
                @endif
            @endif
        </div>
    @endif
</nav>
<div class="container-fluid">
<div class="row bd-highlight">
    @foreach($products as $product)
        <div class="p-2 col-sm-3 bd-highlight">
            <img src="{{ asset("images/" . $product->image) }}" height="300" width="400" alt="Image is not available">
            <p class="text-lg-center"><a href="/product/{{$product->id}}/show" class="caption"> {{ $product->name }} {{ $product->model }}</a></p>
        </div>
    @endforeach
</div></div>

</body>
</html>
