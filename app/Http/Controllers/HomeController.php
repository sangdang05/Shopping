<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $product=Product::orderBy('created_at','DESC')->get();
        $category=Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('user.home',compact('category','product'));
    }

}
