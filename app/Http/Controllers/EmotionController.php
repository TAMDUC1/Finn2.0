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
           // var_dump($emotion->user_id);die();
            if($emotion->user_id = Session::get('user_id')){
                //var_dump('sdgsdg');die();

                //$blog->emotions()->delete($emotion);  ---> delete het toan bo like cua blog
                $emotion1 = Emotion::find($emotion->id); // tim theo id roi delete
                $emotion1->delete();
            }
            elseif (!Session::get('user_id'))
            {
                return view('user.login');
            }

           //return view($blog->currentPage());
            return redirect()->back();
           // return redirect('blogs'.$_COOKIE['pageurl']); //return to currentpage

        }

        else
        {
          //  $emotion = new Emotion(['blog_id' => $id], ['status' => 'like'], ['user_id' => Session::get('user_id')]);
            //$blog->emotions()->save($emotion);
            $emotion = [
                'blog_id' => $id,
                'user_id'=> Session::get('user_id'),
                'status' => 'like'
            ];
            $blog->emotions()->create($emotion);
             return redirect()->back();
            //return redirect('blogs'.$_COOKIE['pageurl']); //return to currentpage
        }
    }
    public function postLikePost(Request $request){
        $id = $request['postId'];
        $blog = Blog::find($id);
        if($emotion = DB::table('emotions')->where('user_id', Session::get('user_id'))->where('blog_id',$id)->first()){
            // var_dump($emotion->user_id);die();
            if($emotion->user_id = Session::get('user_id')){
                //$blog->emotions()->delete($emotion);  ---> delete het toan bo like cua blog
                $emotion1 = Emotion::find($emotion->id); // tim theo id roi delete
                $emotion1->delete();
            }
            //return view($blog->currentPage());
            return redirect()->back();
            // return redirect('blogs'.$_COOKIE['pageurl']); //return to currentpage
        }
        else
        {
            //  $emotion = new Emotion(['blog_id' => $id], ['status' => 'like'], ['user_id' => Session::get('user_id')]);
            //$blog->emotions()->save($emotion);
            $emotion = [
                'blog_id' => $id,
                'user_id'=> Session::get('user_id'),
                'status' => 'like'
            ];
            $blog->emotions()->create($emotion);
            return redirect()->back();
            //return redirect('blogs'.$_COOKIE['pageurl']); //return to currentpage
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

    public function toggle($id)
    {
        $blog = Blog::find($id);

        if($emotion = DB::table('emotions')->where('user_id', Session::get('user_id'))->where('blog_id',$id)->first()){
            if($emotion->user_id = Session::get('user_id')){
                $emotion1 = Emotion::find($emotion->id); // tim theo id roi delete
                $emotion1->delete();
            }
        }
        else
        {
            //  $emotion = new Emotion(['blog_id' => $id], ['status' => 'like'], ['user_id' => Session::get('user_id')]);
            //$blog->emotions()->save($emotion);
            $emotion = [
                'blog_id' => $id,
                'user_id'=> Session::get('user_id'),
                'status' => 'like'
            ];
            $blog->emotions()->create($emotion);
        }
        $response = array(
            'status' => 'success',
            'like' => $blog->emotions()->count(),
        );
        return \Response::json($response);
    }
}
