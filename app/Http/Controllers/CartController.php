<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }
    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('carts.index',[
            'title' => 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }
    public function update(Request $request){

        $this->cartService->update($request);
        return redirect('/carts');
    }
    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',

        ],[
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'address.required' => 'Địa không được để trống',
        ]);

        $this->cartService->addCart($request);

        return redirect()->route('home.index');
    }

}
