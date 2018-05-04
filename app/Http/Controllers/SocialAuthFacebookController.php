<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Blog;
use App\Services\SocialFacebookAccountService;
class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        session(['user_id' => $user->id, 'email' => $user->email,'name' => $user->name]);
        $blog = Blog::where('user_id', $user->id)->get();
        return view('user.profile',compact('blog'));
       // return redirect()->to('/home');
    }
}
