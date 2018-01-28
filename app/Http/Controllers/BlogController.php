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
        //$blog = Blog::all()->paginate(4);
        // var_dump($comment["blog_id"]);die();
        //$comment = Comment::all()->toArray();
        //$blog = DB :: table('blogs')->paginate(4);
        $comment = DB :: table('comments');
        //var_dump($blogs);die();

        //$blog->id = session('blog_id');
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
        if($user){
            $blog = $this->validate(request(), [
                'title' => 'required',
                'content'=>'required'
            ]);
            $blog['author']=$user['name'];
            $user->blogs()->create($blog);
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
        $comment = DB::table('comments')->where('blog_id',$id)->get();
        //$emmotion = Emotion::find($id);
      //  var_dump($blog->emotions()->count());die();
        $commentCount = $blog->commentsCount->first()->aggregate;
        //$blog->emotionsCount->first()->aggregate;
        // var_dump($blog->emotionsCount->first()->aggregate);die();
        //var_dump($comment);die();
        // var_dump($blog); die();
        return view('blog.view',compact('blog'),compact('comment'),$commentCount);
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
       //  var_dump($blog);die();
        $blog = Blog::find($id);
        if($blog){
            $this->validate(request(), [
                'title' => 'required',
                'content' => 'required',
            ]);
            $blog->title = $request->get('title');
            $blog->content = $request->get('content');
            $blog->save();
            return redirect()->route('blogs.index');
        }
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
}
