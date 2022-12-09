<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function test(){
        return view('admin.dashboard');
    }
    //
    public function loadRegister()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
            return redirect('/admin/test');
        } else if (Auth::user() && Auth::user()->is_admin == 0) {
            return redirect('/dashboard');
        }
        return view('auth.register');
    }

    public function studentRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:20',
            'email' => 'string|required|email|max:100',
            'password' => 'string|required|confirmed|min:6'
        ]);

        $userdata = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // if ($userdata){
        return back()->with('success', 'Your Register was successfully');
    }

    public function loadlogin()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
            return redirect('/admin/dashboard');
        } else if (Auth::user() && Auth::user()->is_admin == 0) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'string|required',
        ]);

        $userCredentials = $request->only('email', 'password');
        if (Auth::attempt($userCredentials)) {
            if (Auth::user()->is_admin == 1) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return back()->with('error', 'Username or password is incorrect');
        }
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function loadDashboard()
    {
        return view('student.dashboard');
    }

    public function userLogout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
