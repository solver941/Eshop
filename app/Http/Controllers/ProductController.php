<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function createProduct()
    {
        return view("products/create");
    }

    public function storeProduct(Request $request)
    {

        $request->validate([
            "name" => "required",
            "model" => "required",
            "price" => "required",
            "description" => "required",
            "image" => "required|mimes:jpg,png,jpeg,webp|max:5048"
        ]);
        $newImageName = time() . "-" . $request->name . "." .
            $request->image->extension();
        $request->image->move(public_path("images"), $newImageName);

        $test = Product::create([
            "name" => $request->input('name'),
            "model" => $request->input('model'),
            "price" => $request->input('price'),
            "image" => $newImageName,
            "description" => $request->input('description'),
            "image_path" => $newImageName,
            "visits_count" => 0
        ]);

        return redirect("/back_home");
    }

    public function showProduct($id)
    {
        $all_from_row = Product::where('id', $id)->get();
        $product = Product::find($id);
        $visits = $product->visits_count;
        $visits_count = $visits+1;
        Product::where("id", $id)->update(['visits_count' => $visits_count]);
        session_start();
        $bool = isset($_SESSION["add"]);
        $image = $all_from_row[0]["id"];
        //Below code is modifying the text of the code. I didn't modified the logic you've gone with but only toggling between text based on if it exist in shopping cart session or not.
        $cartProducts=Session::get('cartProducts');
        if(!is_null($cartProducts) && in_array($product->id,$cartProducts)){
            $text="Remove from cart";
        }else{
            $text = "Add to shopping cart";
        }
        return view("products", compact("product", "all_from_row", "bool", "text"));

    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect("/");
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        $name = $product->name;
        $model = $product->model;
        $cena = $product->price;
        $image = $product->image;
        $description = $product->description;

        return view("edit", compact("id", "name", "model", "cena", "image", "description"));
    }
    public function updateProduct(Request $request, $id)
    {
        /*$product = Product::find($id);
        $product->name = $request->input("name");
        $product->model = $request->input("model");
        $product->price = $request->input("price");
        $product->image = $request->input("image");
        $product->description = $request->input("description");

        $product->update();*/
        Product::where("id", $id)->update($request->except([
            "_token", "_method"
        ]));
        return redirect("/");
    }
}

