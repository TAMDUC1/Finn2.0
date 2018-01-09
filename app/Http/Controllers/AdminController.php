<?php
/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Tam <tamduc@stud.ntnu.no>
 * @license  abc vnexpress.net
 * @link     http://vnexpress.net
 *
 PHP version 5 
*/
namespace App\Http\Controllers;
use App\User;
use App\Admin;
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
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = DB :: table('admins')->paginate(4);
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.signUp');
    }

    /**----------- signUp------------------------------*/
    public function store(Request $request)
    {
        $admin = $this->validate(
            request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
            ]
        );
        $admin['password'] = bcrypt($admin['password']);
        Admin::create($admin);
        return redirect()->route('admins.index');
    }
    /**
     * Show
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $this->validate(
            request(), [
            'email' => 'required',
            'password'=>'required',
            ]
        );
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = $request->get('password');
        $admin['password'] = bcrypt($admin['password']);
        $admin->save();
        return redirect()->route('admins.index')->with('success', 'Admin has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if($id!==1) {
            $admin->delete();
        }
        return redirect()->route('admins.index');
    }

}
