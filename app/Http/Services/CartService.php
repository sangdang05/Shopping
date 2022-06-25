<?php


namespace App\Http\Services;
use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class CartService
{

    public function create($request)
    {
        $quantity = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if($quantity <= 0 || $product_id <= 0){
            Session::flash('error','Số lượng hoặc sản phẩm không chính xác');
        }

        $carts = Session::get('carts');

        if(is_null($carts)){
            Session::put('carts',[
                $product_id => $quantity
            ]);

            return true;
        }
        // kiểm tra tồn tại id
        $exists = Arr::exists($carts,$product_id);
        if($exists){
           $carts[$product_id] = $carts[$product_id] + $quantity;
           Session::put('carts',$carts);
           return true;
        }

        $carts[$product_id] = $quantity;
        Session::put('carts',$carts);
        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];

        // lấy ra key_id_product gán vào value
        $productId = array_keys($carts);
        $products = Product::select('id','name','image','price','price_sale')
        ->where('status',1)
        ->whereIn('id',$productId)
        ->get();
        return $products;
    }
    public function update($request){
        Session::put('carts',$request->input('num_product'));
        return true;
    }
    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {

        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;
            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'price_sale', 'image')
                ->where('status', 1)
                ->whereIn('id', $productId)
                ->get();

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);

            $this->infoProductCart($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'Đặt hàng thành công');

            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }
    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'image')
            ->where('status', 1)
            ->whereIn('id', $productId)
            ->get();


        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }
        return Cart::insert($data);
    }
    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'image');
        }])->get();
    }


}
