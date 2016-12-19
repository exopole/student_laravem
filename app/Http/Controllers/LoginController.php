<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

    	if($request->isMethod('get'))
    		return view('auth.login');

    	if ($request->isMethod('post')) {

    		

    		$this->validate($request, [
    			'email' => 'required|email', 
    			'password' => 'required',
    			'remember' => 'in:remember'
    			]);

    		$credentials = $request->only('email', 'password');

    		$remember = false;
    		if(!empty($request->input('remember'))) $remember = true;

    		if(Auth::attempt($credentials, $remember))
    		{
    			return redirect('admin/post')->with(['message' => 'sucess auth']);
    		}
    		else
    			return back()->withInput($request->only('email'))
    						->with(['message' => 'authentification non réussie']);
       	}
    }

    public function logout(){
    	Auth::logout();
    	
    	return redirect()->home();
    }

}
