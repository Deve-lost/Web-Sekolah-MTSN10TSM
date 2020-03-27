<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
    	return view('auths.index');
    }

    public function postlogin(Request $request)
    {
    	if (Auth::attempt($request->only('username','password'))) {
    		return redirect('/Dashboard/MTSN-10-TSM');
    	}

    	return redirect('/Auth-MTSN-10-TSM');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/Auth-MTSN-10-TSM');
    }
}
