<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="/admin" id="corner" class="corner">Přidat</a>
                <br>
                <a href="{{ url('/home_page') }}" class="text-sm text-gray-500 underline">Logout</a>

                <!--                <a href="/admin" id="corner" class="corner">Přidat</a>-->
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-500 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 underline">Register</a>
                @endif
            @endif
            @endif
        </div>
</nav>

        <div class="row bd-highlight">
            @foreach($products as $product)
                <div class="p-2 col-sm-3 bd-highlight">
                    <img src="{{ asset("images/" . $product->image) }}" height="300" width="400" alt="Image is not available">
                    <div class="text-center"><a href="/product/{{$product->id}}/show" class="caption"> {{ $product->name }} {{ $product->model }}</a></div>
                    <a href="/product/{{$product->id}}/delete" class="text-sm text-gray-500 underline">Delete</a>
                    <a href="/product/{{$product->id}}/edit" class="text-sm text-gray-500 underline">Edit</a>
                </div>
            @endforeach
        </div>

</body>
