<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        
        if ($request->isMethod('post')) {

            if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password'], 'status' => 1])) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with(['error' => 'invalid email or password']);
            }
            
            // return $request;
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
