<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class AdminController extends Controller
{
    protected $redirectTo = '/admin/home';
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function username()
    {
        return 'email';
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
