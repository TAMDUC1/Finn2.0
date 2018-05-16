<?php

namespace App\Http\Controllers;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Userapp;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function  showCartItems($id){
        $id1 = Session::get('user_id');
        if(Cart::find($id1)){
            $cart = Cart::where('id', $id1)->first();
            $orderItems1 = OrderItem::where('cart_id', $id1)->get();
            return view('/showCartItems',compact('orderItems1'),compact('cart'));
        }
    }
    public function addItemsToCart($id){
        $personId = Session::get('user_id');
        if (empty($personId)) {
            return redirect()->route('login');
        }
        $cart = Cart::find(session('user_id'));
        $product = Product::find($id);
        if($cart){
            $orderItem1 = OrderItem::where(
                ['cart_id'=>$cart->id,
                  'product_id'=>$id
                ])->first();
            if($orderItem1){
                $orderItem1->amount =  $orderItem1->amount +1 ;
                $deltaPrice = $orderItem1->totalPrice ;
                $orderItem1->totalPrice = $orderItem1['amount'] * $product->price;
                $deltaPrice = $orderItem1->totalPrice - $deltaPrice;
                $orderItem1['imagePath'] = $product->imagePath;
                $orderItem1->cart_id = session('user_id') ;
                $orderItem1->user_id = session('user_id') ;
                $orderItem1->save();
                $this->updateCartTotalPrice(session('user_id'),$deltaPrice);
            }
            else{
                $orderItem['amount'] = 1;
                $orderItem['cart_id'] = $cart->id;
                $orderItem['imagePath'] = $product->imagePath;
                $orderItem['name'] = $product->name;
                $orderItem['type'] = $product->type;
                $orderItem['description'] = $product->description;
                $orderItem['totalPrice'] = $product->price;
                $orderItem['user_id'] = session('user_id') ;
                $product->orderItems()->create($orderItem);
                $this->updateCartTotalPrice(session('user_id'),$product->price);
            }
        }
        else{
            $cart['id'] = session('user_id');
            Cart::create($cart);
            $orderItem['amount'] = 1;
            $orderItem['product_id'] = $id;
            $orderItem['cart_id'] = $cart['id'];
            $orderItem['imagePath'] = $product->imagePath;
            $orderItem['name'] = $product->name;
            $orderItem['type'] = $product->type;
            $orderItem['description'] = $product->description;
            $orderItem['totalPrice'] = $product->price;
            $orderItem['user_id'] = session('user_id') ;
            $product->orderItems()->create($orderItem);
            $this->updateCartTotalPrice(session('user_id'),$product->price);
        }
        return redirect(route('products.index'));
    }
    public function cartTotalPrice($id){
        $cart = Cart::find($id);
        $orderItems = DB::table('order_items')->where('cart_id',$id)->get();
        foreach ($orderItems as $O){
            $cart->totalPrice = $cart->totalPrice + $O->totalPrice;
        }
        session(['cartTotalPrice' => $cart->totalPrice]);
        $amount = $cart->orderItems->count();
        session(['amount' => $amount]);
        return $cart->totalPrice;
    }
    public function updateCartTotalPrice($id,$deltaPrice){
        $cart = Cart::find($id);
        if($cart->totalPrice >=0){
            $cart->totalPrice = $cart->totalPrice +$deltaPrice;
        }
        $cart->save();
        session(['cartTotalPrice' => $cart->totalPrice]);
        return $cart->totalPrice;
    }
    public function removeItemsFromCart(){
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function editOderItemAmount($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
