<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Comment;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Userapp;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
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
    public function index1($id)
    {
        $blog = Blog::find($id);
        $comment = DB::table('comments')->where('blog_id', $id)->first();
        return response(compact('comment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      //  var_dump('sdfsdf');die();
        $blog = Blog::find($id);
        return view('comment.create',compact('blog', 'id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, $id)
    {
        $comment = $this->validate(request(),
            [
                'comment' => 'required|string|max:255',
            ]
        );
        $comment['author'] = Session::get('name');
        $comment['blog_id'] = $id;
        $comment['author_id'] = Session::get('user_id');
        Comment::create($comment);
        return redirect()->route('blogs.index');
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
        $blog = Blog::find($id);
        if ($blog){
            $comment = new Comment(['comment' => $request->get('comment')],['author'=> Session::get('name')],['author_id'=>Session::get('user_id')]);
            $blog->comments()->save($comment);
            $blog->commentsCount->first()->aggregate;
            return redirect()->route('blogs.show',['id'=> $blog->id]);
        }
        else{
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
        //
    }
    public function getComment()
    {
        $id= Session::get('user_id');
        $comment = Comment::where('blog_id', $id)
            ->selectRaw('title,content')
            ->get();
        return response($blog);
    }
}
