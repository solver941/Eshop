<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::user()->id;
        $admin = Role::find($id);
        $admin=$admin->role;
        $verified = $user->hasVerifiedEmail();
        if ($admin==1) {
            Auth::logout();
            /*return view('auth/login');*/
            $products = Product::all();
            Auth::login($user);
            return view('admin_home_page', compact("products"));
        } else{
            if ($verified==true) {
                return view('home');
            } else {
                return view("auth/verify");
        //$products = Product::all();
        //return view('home_page', compact("products"));
        }}}

    public function admin()
    {
        return view("admin");
    }
    public function logout()
    {
        Auth::logout();
        $products = Product::all();
        return view("home_page", compact("products"));
    }
}
