<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    function login(){
        return view('account.login');
    }
    function register(){
        return view('account.register');
    }
}
