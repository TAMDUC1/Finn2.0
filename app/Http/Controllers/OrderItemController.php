<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\OrderItem;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
class OrderItemController extends Controller
{
    public function index()
    {
        //
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
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $orderItem = OrderItem::where([
            'cart_id'=>Session::get('user_id'),
            'product_id'=>$id
        ])->first();
        if($orderItem){
            $orderItem->amount = (int)$_GET['quantity'];
            $orderItem->totalPrice = $orderItem->amount * $product->price;
            $orderItem->save();
            $this->cartTotalPrice(session('user_id'));
        }
        $cart = Cart::find(Session::get('user_id'));
        $response = array(
            'totalPrice' => $cart->totalPrice,
            'orderItemsPrice' => $orderItem->amount * $product->price
        );
        $amount = $cart->orderItems->count();
        session(['amount' => $amount]);
        return \Response::json($response);

    }
    public function update(Request $request, $id)
    {
        $cart = Cart::find(Session::get('user_id'));
        $product = Product::find($id);
        $orderItem = OrderItem::where([
            'cart_id'=>Session::get('user_id'),
            'product_id'=>(int)$id
        ])->first();
        $orderItem->amount = $request->get('amount');
        $orderItem->totalPrice = $request->get('amount') * $product->price;
        $orderItem->save();
        $this->cartTotalPrice(session('user_id'));
        return redirect()->back();
    }
    public function cartTotalPrice($id){
        $cart = Cart::find($id);
        $totalPrice = 0;
        $orderItems = OrderItem::where('cart_id',$id)->get();
        foreach ($orderItems as $O){
            $totalPrice = $totalPrice + $O->totalPrice;
        }
        $cart->totalPrice = $totalPrice;
        $cart->save();
        session(['cartTotalPrice' => $totalPrice]);
        return $totalPrice;
    }
    public function destroy($id)
    {
        $orderItem = OrderItem::where([
            'cart_id'=>Session::get('user_id'),
            'product_id'=>(int)$id
        ])->first();
        $orderItem->delete();
        $cart = Cart::find(Session::get('user_id'));
        $totalPrice = 0;
        $orderItems1 = OrderItem::where([
            'cart_id'=>Session::get('user_id'),
        ])->get();
        if ($orderItems1){
            foreach($orderItems1 as $O){
                $totalPrice = $totalPrice + $O->totalPrice;
            }
        }
        $cart->totalPrice = $totalPrice;
        $cart->save();
        session(['cartTotalPrice' => $totalPrice]);
        $response = array(
            'totalPrice' => $cart->totalPrice,
        );
        return \Response::json($response);
    }
}
