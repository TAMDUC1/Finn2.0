<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Admin;
use App\Blog;
use App\Comment;
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

class MailController extends Controller{
    public function Sending_Email()
    {
        $this->call('GET','Email.test');
        return View('Email.test');
    }

}