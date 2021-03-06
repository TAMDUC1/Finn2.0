<?php
namespace App\Http\Controllers;
use App\User;
use App\Blog;
use App\Guser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Userapp;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Scalar\String_;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }//end login()
    public function signin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $id = Auth::id();
            session(['user_id' => $id, 'email' => $request->email]);
            return redirect()->route('profile');
        }
        return view('user.login');
    }//end signin()
    public function signin1(Request $request)
    {
        $Email = $request->email;
        $Password = $request->password;
        $admin = DB::table('admins')->where('email', $Email)->first();
        //var_dump($admin);die();
        $user = DB::table('users')->where('email', $Email)->first();
        if (!empty($admin)) {
            if ($Email === 'tamduc@stud.ntnu.no') {
                if ($Password==='12345Tam') {
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
    public function profile()
    {
        $email = Session::get('email');
        if($email){
            $user1 = User::where('email',$email)->first();
            $blog = Blog::where('user_id', $user1->id)->get();
            return view('user.profile',compact('blog'));
        }
        $id = Session::get('user_id');
        if($id){
            $user = User::find($id);
            $blog = Blog::where('user_id', $id)->get();
            return view('user.profile',compact('blog'));
        }
        else {
            return redirect()->route('login');
        }
    }//end profile()
    public function create()
    {
        return view('user.signUp');
    }//end create()

    public function store(Request $request)
    {
        $user = $this->validate(
            request(),
            [
                'name' => 'required|string|max:255',
               'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            ]
        );
        $user['password'] = Hash::make($user['password']);
        User::create($user);
      //  $user->carts()->create();
        $userInfo = "name: ".$user['name']."; email: ".$user['email'];
        $fileName = $user['name'].$user['email'].'.txt'; // make file name
        Storage::disk('local')->put( $fileName, $userInfo); // store info to the file
        $exists = Storage::disk('local')->exists($fileName);
        $contents = Storage::get($fileName); // get the content
        //var_dump($contents);die(); // show the content
        //echo asset($user['name'].$user['email'].'.txt');
        $path = storage_path($fileName);
      //->> edit file  Storage::put($fileName , '123');
       // file_put_contents($fileName, 'abca');
       //var_dump(file_put_contents($fileName, str_replace('rrrr','abcd', $contents)));die();
       // $newContent = 'newcontent';
       //File::put( $path, $newContent,$lock = false);
       //var_dump(Storage::get($fileName));die();
        return redirect()->route('login');
    }//end store()
    public function redirectToProvider()
    {
        return Socialite :: driver('google')->redirect();
    }//end redirectToProvider()


    public function handleProviderCallback()
    {
         $user = Socialite::driver('google')->user();
        $email = $user->getEmail();
         $name = $user->getName();
        $avatar = $user->getAvatar();
               $id = $user->getId();// id cua google
        $newUser = User::firstOrCreate(['email'=>$user->getEmail()], ['name' => $user->getName()]);//id cua system
        session(['email' => $email,'name' => $name, 'avatar' => $avatar ,'user_id' => $newUser['id']]);
        return redirect()->route('profile');
    }//end handleProviderCallback()

    public function redirect()
    {
        return Socialite :: driver('facebook')->redirect();
    }//end redirect()

    public function callback()
    {
        $fb = new \Facebook\Facebook(
            [
            'app_id' => '891006804401694',
            'app_secret' => '941e8f3c67e282a0ec6f4453f5637411',
            'default_graph_version' => 'v2.3',
            ]
        );
        $response = $fb->get('/me?fields=id,name,email', 'EAAMqXbARnh4BAMBsFYi6uxujiCii5ll5HQvRIvZB8ZANOhCaZAAZCCPw8wZASDJoRf1ydIwBzqc6MFowEmiFV58XIHDfPP8YJKDgDZBueSFaWSOZAEX5cxtJMDyXi3ZCwCupqPE5DNGlfzTtireJjKpGTXMUyan6x51SB6SbKUjMmLMxM6ZCu0nIzPdnymd5ahGQZD
');
        $user = $response->getGraphUser();
        echo 'Name: ' . $user['name'].'</br>';
        echo 'ID: ' . $user['id'].'</br>';
        echo 'Email: ' . $user['email'].'</br>';
        echo 'Avatar:'.'http://graph.facebook.com/'.$user['id'].'/picture'.'</br>';
         $avatar = 'http://graph.facebook.com/'.$user['id'].'/picture';
        $newUser = User::firstOrCreate(['email' => $user['email']], ['name' => $user['name']]);
         session(['email'=>$user['email'],'name' => $user['name'], 'avatar' => $avatar], ['user_id' => $newUser['id']]);
             $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
           $loginUrl = $helper->getLoginUrl('http://http://localhost:8000/callback', $permissions);
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        } if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            // Now you can redirect to another page and use the
            // access token from $_SESSION['facebook_access_token']
        } elseif ($helper->getError()) {
            // The user denied the request
            exit;
        }
        return view('user.profile',compact('blog'));
       // return redirect()->route('profile');
    }//end callback()

    public function logout()
    {
           Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }//end logout()

    public function home()
    {
        return view('user.home');
    }//end home()

    public function post()
    {
        return view('user.post');
    }//end post()

    public function index()
    {
        $user = DB :: table('users')->paginate(4);
        return view('user.index', compact('user'));
    }//end index()

    public function show($id)
    {
        //
    }//end show()

    public function searchName(Request $request)
    {
          $email = $request->email;
        $queries = DB::table('users')
            ->Where('email', 'like.js', '%'.$email.'%')
            ->take(20)->get();
        foreach ($queries as $q) {
            $results[] = ['email' => $q->email];
        }
        return response()->json($results);
    }//end searchName()

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(request(), [
            'password' => 'required',
        ]);
        $user->password = bcrypt($request->get('password'));
      //$user['password'] = bcrypt($user['password']);
        $user->save();
     //   var_dump($request->get('password') );die();
        return redirect()->route('root')->with('success', 'User has been updated');
    }//end update()

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user', 'id'));
    }//end edit()

    public function changePass(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(request(), [
            'password' => 'required',
        ]);
       // $user->password = bcrypt($request->get('password'));
        $user['password'] = Hash::make($user['password']);
        //$user['password'] = bcrypt($user['password']);
        $user->save();
        return redirect()->route('profile')->with('success', 'Password has been changed');
    }//end changePass

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }//end destroy()
    public function checkAvailable(Request $request){
        $user = User::where('email',$request->get('email'))->first();
        $avatar = 'http://graph.facebook.com/'.$request->get('facebookId').'/picture';
        if($user){
            session(['email'=>$user->email,'name' => $user->name, 'avatar' => $avatar,'user_id' => $user->id]);
        }
        elseif(!$user){
            $newUser = new User();
            $newUser['name'] = $request->get('name');
            $newUser['email'] = $request->get('email');
            $newUser->save();
            session(['email'=>$request->get('email'),'name' => $request->get('name'), 'avatar' => $avatar,'user_id' => $newUser->id]);
        }



    }
}
