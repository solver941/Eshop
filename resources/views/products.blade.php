@extends("layouts.main_layout")
@section("content")
<div class="container">
<h1 style="text-align: center">{{ $all_from_row[0]["name"] }} {{ $all_from_row[0]["model"] }}</h1>
<img  width="500px" height="auto" class="rounded mx-auto d-block" src="{{ asset("storage/images/" . $product->image_path) }}" alt="af">
    @if (session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif
    <div class="container"></div>


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
            /*if(Session::has('success'))
                <div class="alert alert-success">
                {{--{{Session::get('success')}}--}}
                </div>*/

        }

    }
</script>
</div>
@endsection
