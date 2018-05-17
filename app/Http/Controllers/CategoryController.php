<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
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

    public function getCategory($id){

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

       // var_dump('test');die();
        $categories = Category::all();
        $product = Product::where('category_id',$id)->get();
        $sorted = $product->sortBy('price');
        $sorted->values()->all();

        //print_r($sorted);die();
        //$product = DB :: table('products')->paginate(100);
        return view('Web.listItems', compact('sorted'),compact('categories'));


      //  $product = Product::where('category_id',$id)->get();
        //return Response::json($product);

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
