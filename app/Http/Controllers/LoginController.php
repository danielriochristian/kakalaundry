<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){
      return view('login.login');
    }
    public function postLogin(Request $request)
  {
    if (Auth::attempt ([
        'email' => $request->email,
        'password' => $request->password
      ]))
    {
      return redirect('/order')->with('status', 'Anda Telah berhasil login!');
    }
    else {
      return Redirect::back()->withErrors(['Password atau email anda salah!']);
    }
  }
  public function logout(Request $request) {
  Auth::logout();
  return redirect('/');
}
}
