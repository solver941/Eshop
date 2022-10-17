<head xmlns="">
    <title>Product</title>
    <link href="/css/positions.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<nav class="navbar navbar-light bg-light">
    <a href="{{ route('check') }}"><h1>E-shop</h1></a>
<!--    <a href="/shopping_cart"><img src="shopping_cart.webp" height=100 alt=""></a>-->
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="/shopping_cart"><img src="shopping_cart.webp" height=100 class="btn btn-success pull-right" alt=""></a>
                <a href="{{ url('/home') }}" class="text-sm text-gray-500 underline">Home</a>
            @else
                <a href="/shopping_cart"><img src="shopping_cart.webp" height=100 class="corner" id="corner"></a>
                <a href="{{ route('login') }}" class="text-sm text-gray-500 underline">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 underline">Register</a>
                @endif
            @endif
        </div>
    @endif
</nav>
<div class="container">
<h1 style="text-align: center">{{ $all_from_row[0]["name"] }} {{ $all_from_row[0]["model"] }}</h1>


    <img  width="500px" height="auto" src="{{ asset("images/" . $product->image_path) }}" alt="af">

    <br>
<!--    <main role="main" class="container">
        <div  style="text-align: center" class="starter-template">
            <p class="lead">{{--{{ $all_from_row[0]["description"] }}--}}</p>
        </div>
    </main>-->
<div  style="text-align: center" class="blockquote text-center">

    <div class="h-auto d-inline-block" style="width: 600px">{{ $all_from_row[0]["description"] }}</div>
</div>

@csrf
<button onclick="doSomething()" class="corner" id="test">{{$text}}</button>
<script>
    function doSomething() {
        var x = document.getElementById("test");
        if (x.innerHTML === "Add to shopping cart") {
            x.innerHTML = "Remove from shopping cart";
            //$added_product = "Acer Nitro 5";
            sessionStorage.setItem({{$all_from_row[0]["id"]}}, "True")

            $item = sessionStorage.getItem("True")
            window.location.href="/add_cart/{{$all_from_row[0]["id"]}}"
            //window.location.href="/add_cart/{{--{{$all_from_row[0]["id"]}}"--}}//

        } else {
            x.innerHTML = "Add to shopping cart";
            window.location.href="/add_cart/{{$all_from_row[0]["id"]}}"
        }

    }
</script>
</div>
