<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Blog;
use App\Emotion;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Userapp;
use Illuminate\Support\Facades\Hash;
class EmotionController extends Controller
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
     * Display CurrentLike
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLike()
    {
        //check currentLike
        //update currentLike (tao moi hoac giam bot)
        //return currentLike

    }
    /**
     * Reurn current Dislike
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDislike()
    {
        //check currentDisLike
        //update currentDisLike (tao moi hoac giam bot)
        //return currentDisLike

    }


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
        $blog = Blog::find($id);
        if($emotion = DB::table('emotions')->where('user_id', Session::get('user_id'))->where('blog_id',$id)->first()){
           //var_dump($emotion);die();
           //$blog->emotions()->delete($emotion);
            return redirect()->route('blogs.index');
        }
        else
        {
            $emotion =  [
                'blog_id' => $id,
                'user_id'=> Session::get('user_id'),
                'status' => 'like'
            ];
            $blog->emotions()->create($emotion);
            return redirect()->route('blogs.index');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $user_id)
    {

        $blog = Blog::find($id);
        $currentLike =$blog->emotions()->count();
        $emotion =  [
            'blog_id' => $id,
            'user_id'=> $user_id,
            'status' => 'like'
        ];
        $blog->emotions()->create($emotion);
        $currentLike = $currentLike +1 ;
        return $blog->emotions()->count() ;
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
