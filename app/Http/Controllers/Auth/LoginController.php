<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
        $this->middleware('guest:mahasiswa')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }
}
