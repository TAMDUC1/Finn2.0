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
        //show all orderItem here
        //find cart
       // var_dump('wg');die();
        $id1 = Session::get('user_id');
        //var_dump($id1);die();
        $cart = Cart::find($id1);
        // find orderItems with the same cart_id
        $orderItems = DB::table('order_items')->where('cart_id',$id1)->get();
        $orderItems1 = OrderItem::where('cart_id', $id1)->get();
        // $orderItems1 = DB::table('order_items')->keyBy('cart_id' , $id1);
        // var_dump($orderItems);die();
        return view('/showCartItems',compact('orderItems1'),compact('cart'));
    }
    public function addItemsToCart($id){
        // find Cart first or create a cart for an user
        $cart = Cart::find(session('user_id'));
        // tim loai product de add vao cart
        $product = Product::find($id);
        // tim order item trung vs loai product_id
        if($cart){
            // tim xem item da duoc order truoc day chua neu da duoc order roi thi update amount va gia
            $orderItem1 = OrderItem::where(
                ['cart_id'=>$cart->id,
                  'product_id'=>$id
                ])->first();
            if($orderItem1){// tim thay item ->update
                $orderItem1->amount =  $orderItem1->amount +1 ;
                $deltaPrice = $orderItem1->totalPrice ;
                $orderItem1->totalPrice = $orderItem1['amount'] * $product->price;
                $deltaPrice = $orderItem1->totalPrice - $deltaPrice;
                $orderItem1['imagePath'] = $product->imagePath;
                $orderItem1->cart_id = session('user_id') ;
                $orderItem1->save();
                $this->updateCartTotalPrice(session('user_id'),$deltaPrice);

               // var_dump($orderItem1->amount);die();
            }
            //neu khong tim duoc item trong gio hang thi tao ra item moi voi don vi la 1
            else{
                $orderItem['amount'] = 1;
                $orderItem['cart_id'] = $cart->id;
                $orderItem['imagePath'] = $product->imagePath;
                $orderItem['name'] = $product->name;
                $orderItem['type'] = $product->type;
                $orderItem['description'] = $product->description;
                $orderItem['totalPrice'] = $product->price;
                $product->orderItems()->create($orderItem);
                $this->updateCartTotalPrice(session('user_id'),$product->price);
            }
            // neu co cart thi tao order item
           // var_dump($orderItem);die();
        }
        else{
            //neu khong co cart thi tao cart
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
            $product->orderItems()->create($orderItem);
           // OrderItem::create($orderItem);
            $this->updateCartTotalPrice(session('user_id'),$product->price);
        }
        return redirect(route('products.index'));
    }
    // calculate Total Price of the cart
    public function cartTotalPrice($id){
        $cart = Cart::find($id);
        $orderItems = DB::table('order_items')->where('cart_id',$id)->get();
        foreach ($orderItems as $O){
            $cart->totalPrice = $cart->totalPrice + $O->totalPrice;
        }
        session(['cartTotalPrice' => $cart->totalPrice]);
        return $cart->totalPrice;
    }
    public function updateCartTotalPrice($id,$deltaPrice){
        // tinh tong gia thanh cua Cart $id
        // tim trong database cart nhung item co cung $id
        //$orderItems = DB::table('order_items')->where('cart_id',$id)->get();
        // tinh tong so tien tu order item!
        //  foreach ($orderItems as $O){
        // var_dump('sdfaf');die();
        //    $cart->totalPrice = $cart->totalPrice + $O->totalPrice;
        // }
        //var_dump($cart->totalPrice);die();
        $cart = Cart::find($id);
        if($cart->totalPrice >=0){
            $cart->totalPrice = $cart->totalPrice +$deltaPrice;
        }
        $cart->save();
        session(['cartTotalPrice' => $cart->totalPrice]);
        return $cart->totalPrice;
    }
    public function removeItemsFromCart(){
        //find Cart
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
