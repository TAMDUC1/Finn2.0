<?php

namespace App\Http\Controllers;
use App\Blog;
use App\User;
use App\Guser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Userapp;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }
    //------------login using auth-----------------//
    public function signin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($request->only('email','password')))
        {
            $id = Auth::id();
            session(['user_id' => $id,'email'=>$request->email]);
            return redirect()->route('profile');
        }
        return view ('user.login');
    }
    //--------------normal login-------------------//

    public function signin1(Request $request){
        $Email =$request->email;
        $Password = $request->password;
        $users = DB::table('users')->get();
        foreach ($users as $user)
        {
            if($Email===$user->email)
            {
                if($Email==='tamduc@stud.ntnu.no')
                {
                    if(Hash::check($Password,$user->password))
                    {
                        session(['user_id'=>$user->id,'email'=>$request->email]);
                        return view('admin.profile');
                    }
                }
                if($Email!=='tamduc@stud.ntnu.no'){
                    if(Hash::check($Password,$user->password)){
                        session(['user_id'=>$user->id,'email'=>$request->email]);
                        return redirect()->route('profile');
                    }
                }
            }
        }
    }

    //-------------profile view----------------------//

    public function profile()
        {
            $id = Session::get('user_id');
            if(empty($id)){
                return redirect()->route('login');
            }
            return view('user.profile');
        }

    //-------------signUp view-------------------------//

    public function create()
    {
        return view('user.signUp');
    }

    //----------- signUp------------------------------//

    public function store(Request $request)
    {
        $user = $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
        ]);
        $user['password'] = bcrypt($user['password']);
        User::create($user);
        return redirect()->route('login');
    }
    //-----------------------------------------------//

    public function redirectToProvider(){
        return Socialite :: driver('google')->redirect();
    }
    public function handleProviderCallback(){

        $user = Socialite::driver('google')->user();
        $email = $user->getEmail();
        $name = $user->getName();
        $avatar = $user->getAvatar();
        $id = $user->getId();// id cua google
        $newUser = User::firstOrCreate(['email'=>$user->getEmail()],['name' => $user->getName()]);//id cua system
        session(['email'=>$email,'name'=>$name,'avatar' => $avatar,'user_id'=>$newUser['id']]);
        return redirect()->route('profile');
    }

    //-----------------------------------------------//

    public function redirect(){
        return Socialite :: driver('facebook')->redirect();
    }

    //-----------------------------------------------//

    public function callback()
    {
        $fb = new \Facebook\Facebook([
            'app_id' => '891006804401694',
            'app_secret' => '941e8f3c67e282a0ec6f4453f5637411',
            'default_graph_version' => 'v2.3',
            // . . .
        ]);
        $response = $fb->get('/me?fields=id,name,email', 'EAAMqXbARnh4BAJdQU5WlkS2iT5OYXXkExl2P0XHAz2sMadG6VZCO8YSZCYM9cCSPASF2kdh71z33oLB4S2kX3MBLAbawlH19ZCqTWN8ShRADCryI0XCiM7GYbudyCZCCOdkii80fzQuFITv43y8l1W0ZAZAEk306BjbvMtz5RGdgZDZD');
        $user = $response->getGraphUser();
        echo 'Name: ' . $user['name'].'</br>';
        echo 'ID: ' . $user['id'].'</br>';
        echo 'Email: ' . $user['email'].'</br>';
        echo 'Avatar:'.'http://graph.facebook.com/'.$user['id'].'/picture'.'</br>';
        $avatar = 'http://graph.facebook.com/'.$user['id'].'/picture';
        $newUser = User::firstOrCreate(['email'=>$user['email']],['name' => $user['name']]);
        session(['email'=>$user['email'],'name'=>$user['name'],'avatar'=>$avatar],['user_id'=>$newUser['id']]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl('http://http://localhost:8000/callback', $permissions);
        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            // Now you can redirect to another page and use the
            // access token from $_SESSION['facebook_access_token']
        } elseif ($helper->getError()) {
            // The user denied the request
            exit;
        }
        return redirect()->route('profile');
    }
    //--------------------Log out-----------------------//

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    //------------------------------------------------//

    public function home()
    {
        return view('user.home');
    }

    //------------------------------------------------//

    public function post()
    {
        return view('user.post');
    }

    //------------------------------------------------//

    public function index()
    {
        $user = DB :: table('users')->paginate(4);
        return view('user.index',compact('user'));
    }

    //------------------------------------------------//

    public function show($id)
    {
        //
    }

    //------------------------------------------------//

    public function searchName (Request $request){
        $email = $request->email;
        $queries = DB::table('users')
            ->Where('email','like','%'.$email.'%')
            ->take(20)->get();
        foreach ($queries as $q){
            $results[]=['email' => $q->email];
        }
        return response()->json($results);
    }

    //------------------------------------------------//

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(request(), [
            'password'=>'required',
        ]);
        $user->password = bcrypt($request->get('password'));
      //  $user['password'] = bcrypt($user['password']);
        $user->save();
     //   var_dump($request->get('password') );die();
        return redirect()->route('root')->with('success','User has been updated');
    }

    //------------------------------------------------//

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user','id'));
    }

    //------------------------------------------------//

    public function changePass(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(request(), [
            'password'=>'required',
        ]);
        $user->password = bcrypt($request->get('password'));
       // $user['password'] = bcrypt($user['password']);
        $user->save();
        return redirect()->route('profile')->with('success','Password has been changed');
    }

    //------------------------------------------------//

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('success','User has been  deleted');
    }
}
