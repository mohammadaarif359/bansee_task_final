<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm() {
		return view('auth.register');
	}
	public function register(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email',
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile',
			'password'=> 'required|min:6|confirmed',
		]);
		$user = User::create([
			'name'=>$request_data['name'],
			'email'=>trim($request_data['email']),
			'mobile'=>$request_data['mobile'],
			'status'=>1,
			'password'=>bcrypt($request_data['password'])
		]);
		return redirect()->route('login')->with('success', 'User register Successfully !');
	}
}
