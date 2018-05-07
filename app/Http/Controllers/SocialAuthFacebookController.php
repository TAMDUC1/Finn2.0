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
        $fb = new \Facebook\Facebook(
            [
                'app_id' => '891006804401694',
                'app_secret' => '941e8f3c67e282a0ec6f4453f5637411',
                'default_graph_version' => 'v2.3',
            ]
        );
        $response = $fb->get('/me?fields=id,name,email', 'EAAMqXbARnh4BADpOfPWVk2VnkpT2pOEHNArn9iJDwNybZC2S5masQZAkZCVEnSSIhk6xiInejcohyQfnkDcyFaVRdZBrYZCGzCHQnCvMgRaIaSp8lenJT94ZCHXZCpJtSM1ZBYskSDfkEiNTf0WNPk2cc2tbnjgWcyaAoq4NmpEqqD21MCbiywgxxwua3ZBbmmQwZD');
        $user1 = $response->getGraphUser();
        $avatar = 'http://graph.facebook.com/'.$user1['id'].'/picture';
        session(['avatar' => $avatar]);

        return view('user.profile',compact('blog'));
       // return redirect()->to('/home');
    }





}
