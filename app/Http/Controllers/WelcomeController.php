<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function check_admin()
    {

        $products = Product::all()->sortByDesc("visits_count");
        if (Auth::user()) {
            $id = Auth::user()->id;
            $admin = Role::find($id);
            $admin=$admin->role;
        } else {
            $admin = 0;
        }


        /*dd($admin);*/
        if($admin===0){
            return view("home_page", compact("products", "admin"));
        } else {
            return view("admin_home_page", compact("products", "admin", "id"));
        }

    }
    public function home()
    {
        $products = Product::all()->sortByDesc("visits_count");
        return view("home_page", compact("products"));
    }

}
