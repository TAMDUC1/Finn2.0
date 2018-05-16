<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $categories = Category::all();
        $product = Product::paginate(100);
        $sorted = $product->sortBy('price');
        $sorted->values()->all();
        //$product = DB :: table('products')->paginate(100);
        return view('Web.listItems', compact('sorted'),compact('categories'));
    }
    public function index1()
    {
        $product = Product::sortable()->paginate(100);
        // $product = DB :: table('products')->paginate(10);
        return view('Web.listItems', compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->validate(request(), [
            'name' => 'required',
            'type'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'description'=>'required',
          //  'imagePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        //var_dump($request->photo);die();
       //$destinationPath = public_path('/images/productImages');
       // $request->photo->store($destinationPath);

       $extension = $request->photo->getClientOriginalExtension();
        $fileName = $request->name.'.'.$extension;
        $path = $request->photo->storeas('/public/images/productImages',$fileName);
       // $product['imagePath']='storage/images/productImages/'.$fileName;
        $product['imagePath']=$fileName;

        // var_dump($fileName);die();
        //   how to dis play <img class="img-responsive" style="width: 50px" src="{{ url('storage/images/productImages/'.'ja2android.png') }}" alt="" title="" />
        // 'storage/images/productImages/'.'ja2android.png'  ---->path
       // var_dump($product['imagePath']);die();
        Product::create($product);
        //$product->save();
      //
        return back() ->with('nice');
      //  $image = $request->file('image');
      //  $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       // $image->move($destinationPath, $input['imagename']);
     //   $this->postImage->add($input);
        // todo: upload image here
     /*   $file = $_FILES['photo'];
        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];
        $fileSize = $_FILES['photo']['size'];
        $fileError = $_FILES['photo']['error'];
        $fileType = $_FILES['photo']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError===0) {
                if ($fileSize<1000000) {
                    $fileNameNew= uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'storage/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $product['photo']= $fileDestination;
                } else {
                    echo "Your file is too big";
                }
            } else {
                echo "There was an error";
            }
        } else {
            echo "you cant upload files of this type";
        }
     */

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('Web.kid', compact('product', 'id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product', 'id'));
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
        //$product = Product :: find($id);
        $this->validate(request(), [
            'name' => 'required',
            'model'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'descriptions'=>'required',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product :: find($id);
        $product -> delete();
        return redirect()->route('ProductIndex');

      //  return redirect('products.index')->with('success');
    }
}
