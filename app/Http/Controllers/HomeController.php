<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        // sort by price
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by =='desc')
            $product = Product::orderBy('price','DESC')->get();
            elseif($sort_by =='asc')
            $product = Product::orderBy('price','ASC')->get();
            else
            $product = Product::orderBy('created_at','DESC')->get();
        }
        else{
            $product = Product::orderBy('created_at','DESC')->get();
        }
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
    public function search(Request $request)
    {
        $key = $request->search;
        $product = Product::where('name','like','%'.$request->search.'%')->get();
        return view('user.search',compact('product','key'));
    }

}
