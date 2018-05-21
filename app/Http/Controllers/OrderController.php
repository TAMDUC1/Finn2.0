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
        $order = Order::paginate(10);
       // $comment = DB :: table('comments');
        return view('order.index', compact('order'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =User::find(session('user_id'));
        $cart = Cart::find(session('user_id'));
        //tao order
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
        $order['cart_id'] = session('user_id');
        $order['user_id'] = session('user_id');

        // print_r('kuyfk');die();
        // Tao order
        $id = $user->orders()->create($order)->id;
        // get all of the orders from the user
        $order1 = Order::where('user_id', session('user_id'))->get();
        // thay doi noi dung OrderItems
        $orderItems1 = OrderItem::where('cart_id', session('user_id'))->get();
        foreach ($orderItems1 as $O){
            $O->order_id = $id;
            $O->cart_id = null;
            $O->save();
        }
        //xoa cart
        $cart -> delete();//done
        $request->session()->forget('cartTotalPrice');
        //get all the order_items of this user to the view
        $orderItems = OrderItem::where('user_id', session('user_id'))->get();
        return view('Web.confirmation',compact('orderItems','order1','user'));
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =User::find($id);
        $cart = Cart::find($id);
        $orderItems = OrderItem::where('user_id', session('user_id'))->get();
        $order1 = Order::where('user_id',session('user_id'))->get();
        return view('Web.confirmation',compact('orderItems','user','order1'));
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
        $order = Order::find($id);
            $order->delete();
        return redirect()->route('order');
    }
}
