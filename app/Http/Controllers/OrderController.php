<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\OrderItem;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //create new Order
        //luu thong tin delivery
        //dien thong tin order_id vao order_items->id
        //lay thong tin
        $user =User::find(session('user_id'));
        $cart = Cart::find(session('user_id'));
        $orderItems1 = OrderItem::where('cart_id', session('user_id'))->get();
        $order = $this->validate(
            request(),
            [
                'receiverName'    => 'required|string|max:255',
                'receiverPhone'   => 'required|integer',
                'email'           => 'required|string|email|max:255',
                'deliveryAddress'    => 'required|string|max:255',
                'city'            => 'required|string|max:255',
                'nameOnCard'      => 'required|string',
                'cardNumber'      => 'required|integer',
            ]
        );
        $order['totalPrice'] = $cart['totalPrice'];
        $user->orders()->create($order);
        $order1 = Order::where('totalPrice',$cart->totalPrice)->first();
        return view('Web.confirmation',compact('user','cart','orderItems1','order1'));
       // return redirect()->route('profile')->with(compact('orderItems1'));
       // return redirect()->route('profile',compact('orderItems1'),compact('cart'),compact('order'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =User::find($id);
        $cart = Cart::find($id);
        $orderItems1 = OrderItem::where('cart_id', $id)->get();
        $order1 = Order::where('totalPrice',$cart->totalPrice)->first();
        return view('Web.confirmation',compact('user','cart','orderItems1','order1'));
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
