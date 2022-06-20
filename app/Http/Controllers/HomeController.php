<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at','DESC')->get();
        $category = Category::where('status',1)->orderBy('created_at','DESC')->limit(3)->get();
        return view('home',compact('category','product'));
    }
    public function view($id,$slug)
    {
        $modelCategory = Category::where('slug',$slug)->first();
        $products = Product::where('slug',$slug)->first();
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        if($products){
            return view('user.product',['products'=>$products,'category'=>$category]);
        }
        elseif($category){
            return view('user.category',['modelCategory'=>$modelCategory,'category'=>$category]);
        }
    }

}
