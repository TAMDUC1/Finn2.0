<?php

namespace App\Http\Controllers;

use App\Emotion;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Blog;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::paginate(4);
        $comment = DB :: table('comments');
        return view('blog.index', compact('blog'),compact('comment'),compact('blogs'));
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
        $user =User::find(session('user_id'));
        $email = Session::get('email');

        if($user){
            $blog = $this->validate(request(), [
                'title' => 'required',
                'content'=>'required'
            ]);
            $blog['author']=$user['name'];
            $fileName = $blog['title'].'.txt';// make the fileName
            Storage::disk('local')->put( $fileName, $blog['content']);//store info to the file
            $user->blogs()->create($blog);
            return response()->json($blog);
        }
        elseif ($email){
            $user1 = User::where('email',$email)->first();
            $blog = $this->validate(request(), [
                'title' => 'required',
                'content'=>'required'
            ]);
            $blog['author']=Session::get('name');
            $fileName = $blog['title'].'.txt';// make the fileName
            Storage::disk('local')->put( $fileName, $blog['content']);//store info to the file
            $user1->blogs()->create($blog);
            return response()->json($blog);
        }
        else{

            return redirect()->route('login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $blog = Blog::find($id);
        $comment = DB::table('comments')->where('blog_id',$id)->paginate(10);
        return view('blog.view',compact('blog'),compact('comment'));
    }

    public function showComment($id)
    {
        $blog = Blog::find($id);
        $comment = DB::table('comments')->where('blog_id',$id)->get();
        return view('blog.viewcomment')->with('comment',json_decode($comment));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('blog.edit', compact('blog', 'id'));
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

        $blog = Blog::find($id);
       //
        $blog->title = $request->get('title');
        $blog->content = $request->get('content');
        $blog->save();
        return redirect()->route('blogs.show',['id'=> $blog->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->comments()->delete();
        $blog->emotions()->delete();
        $blog -> delete();
        return redirect()->route('blogs.index');
    }

    public function getBlog()
    {
          $id = Session::get('user_id');
        $blog = Blog::where('user_id', $id)
              ->selectRaw('title,content')
              ->get();
        return response($blog);

    }

    public function editTitleBlog($id){
        $blog =Blog::find($id);
        $blog->title = $_POST['title'];
        $blog->save();
    }

    public function editContentBlog($id){
        $blog =Blog::find($id);
        $blog->content = $_POST['content'];
        $blog->save();
    }
}
