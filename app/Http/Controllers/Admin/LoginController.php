<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function loginForm()
    {
        return view('admin.pages.auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->guard('web')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->route('dashboard')->with(['success' => 'مرحبا ' . Auth::user()->name . ' 😇']);
        } else {
            return redirect()->back()->with(['error' => '😕  ' . 'هناك خطا بالبيانات']);
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('yourKeyGoesHere');
        session()->regenerate();
        Artisan::call('cache:clear');
        return redirect()
            ->route('login.form')
            ->with(['success' => '☹️ ' . 'تم الخروج بنجاح']);
    }
}
