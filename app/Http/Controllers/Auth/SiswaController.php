<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class SiswaController extends DefaultLoginController
{
    protected $redirectTo = '/siswa';
    public function __construct()
    {
        $this->middleware('guest:siswa')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login.siswa');
    }
    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);
    //     if (Auth::guard('siswa')->attempt(['nis' => $request->email, 'password' => $request->password])) {
    //         // if successful, then redirect to their intended location
    //         return redirect()->intended('/admin');
    //     } else {
    //         return redirect()->back();
    //     }
  
    // }
    public function username()
    {
        return 'nis';
    }
    protected function guard()
    {
        return Auth::guard('siswa');
    }
}
