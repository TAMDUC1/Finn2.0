<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Userapp;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Scalar\String_;

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
        $id1 = Session::get('user_id');
        $cart = Cart::find($id1);
        // find orderItems with the same cart_id
        $orderItems = DB::table('order_items')->where('cart_id',$id)->get();
        return view('Web.wishList',compact($orderItems));
    }

    public function addItemsToCart($id){
        //find an user by session
        $user =User::find(session('user_id'));
        // find Cart first or create a cart for an user
        $cart = Cart::firstOrCreate(['id' => session('user_id')]);
        $cart ->save();
        // make An OderItem object
        $orderItem['cart_id'] = $cart->id;
        var_dump($cart);die();
        $product =Product::find($id);
        $product->orderItems()->create($orderItem);
       // var_dump('wef');die();
       // $orderItem->save();
        // create order_items with Cart id and amount
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
