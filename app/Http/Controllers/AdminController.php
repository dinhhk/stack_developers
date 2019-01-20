<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request) {
    	if($request->isMethod('post')) {
    		$data = $request->input();
    		if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => 1])) {
    			return redirect()->route('admin.dashboard');
    		} else {
                return redirect()->route('admin.login')->with('alert-danger', 'Invalid username and password.');
            }
    	}
        
    	return view('admin.admin_login');
    }

    public function dashboard(Request $request) {
        return view('admin.dashboard');
    }

    public function logout() {
        Session::flush();

        return redirect()->route('admin.login')->with('alert-success', 'Logged out successfully.');
    }
}
