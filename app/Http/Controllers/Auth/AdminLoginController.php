<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AdminLoginController extends Controller
{
	public function __construct()
    {
		$this->middleware('guest:admin');
	}

    public function showLoginForm()
    {
    	return view('login');
    }

    public function login()
    {
    	// Validate the form data
        $rules = [
            'name' => [
            'required',
            Rule::exists('admins')->where(function($query) {
                $query->where('name', request('name'));
             }),
            ],
            'password' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre de usuario es obligatorio',
            'name.exists' => 'El nombre nombre usuario ingresado es incorrecto',
            'password.required' => 'La contraseña es obligatoria'
        ];

    	$this->validate(request() , $rules, $messages);

    	$credentials = [
    		'name' => request('name'),
    		'password' => request('password')
    	];

    	// Attemp to log the user in admin model
    	if (\Auth::guard('admin')->attempt($credentials, request('remember'))) {
    		// if successful, redirect to the admin panel
    		return redirect()->intended(route('panel'));
    	}

    	// if unsuccesful redirect back
    	return redirect()->back()->withInput(request()->only('name'));

    }
}