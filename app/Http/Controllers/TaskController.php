<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class TaskController
{
    public function add_cart($id)
    {

        //Here we are creating a session for the shopping cart where we are doing two things:
        //Checking if product exist in the cart then removing it or if it doesn't exist, then add to the cart.
        $products=Session::get('cartProducts');



        //dd(!is_null($products) && in_array($id,$products));
        if(!is_null($products) && in_array($id,$products)) {
            $key=array_search($id, $products);
            unset($products[$key]);

        }
        else{
            $products[] = $id;
            //dd("else");
        }
        Session::put('cartProducts', $products);
        return redirect()->back();
    }
    public function shopping_cart()
    {
        $products=Session::get('cartProducts');

        if (((isset($products))==true)&&($products !== [])){
            $values = value($products);
            $all_from_rows = [];
            $a = 0;

            foreach($values as $value){
                $all_from_row = Product::where('id', $value)->get();
                array_push($all_from_rows, $all_from_row);
                $a++;
            }

            $length = count($values);
            $empty = false;
            $total_price = 0;
            return view("shopping-cart", compact("values", "length", "empty","total_price", "all_from_rows"));
        } else{
            $empty = true;
            return view("shopping-cart", compact("empty"));
            //dd("not set", compact("empty"));
        }
    }
}
