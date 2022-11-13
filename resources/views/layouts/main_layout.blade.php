<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="/css/positions.css" rel="stylesheet">

</head>


<nav class="navbar navbar-light bg-light">
    <a href="/back_home"><h1>E-shop</h1></a>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth

                <a href="/shopping_cart"><img src="shopping_cart.webp" height=100</a>
                <a href="{{ url('/home') }}" class="text-sm text-gray-500 underline">Home</a>
            @else

                <a href="/shopping_cart"><img src="shopping_cart.webp" height=100></a>
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
@yield("content")

