<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Blog;
use App\Guser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Userapp;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function signin2(Request $request)
    {
        $Email = $request->email;
        $Password = $request->password;
        $admin = DB::table('admins')->where('email', $Email)->first();
        $user = DB::table('users')->where('email', $Email)->first();
        if (!empty($admin)) {
            if ($Email === 'tamduc@stud.ntnu.no') {
                if (Hash::check($Password, $admin->password)) {
                    session(['user_id' => $admin->id, 'email' => $request->email, 'role' =>'boss','name' =>'admin tam']);
                    $blog = Blog::where('user_id', $admin->id)->get();
                    return view('admin.profile',compact('blog'));
                }
            } elseif ($Email !== 'tamduc@stud.ntnu.no') {
                if (Hash::check($Password, $admin->password)) {
                    session(['user_id' => $admin->id, 'email' => $request->email,'role' =>'admin','name' => $admin->name]);
                    $blog = Blog::where('user_id', $admin->id)->get();
                    return view('admin.profile',compact('blog'));
                }
            }
        } elseif (empty($admin)) {
            if (!empty($user)) {
                if (Hash::check($Password, $user->password)) {
                    session(['user_id' => $user->id, 'email' => $request->email,'name' => $user->name]);
                    $blog = Blog::where('user_id', $user->id)->get();
                    return view('user.profile',compact('blog'));
                } else {
                    echo 'wrong password';
                }
            } if (empty($user)) {
                echo 'no user found';
            }
        }
    }//end signin1()

}
