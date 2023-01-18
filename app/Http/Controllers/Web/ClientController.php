<?php

namespace App\Http\Controllers\Web;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //
    public function registerForm()
    {
        return view('web.pages.auth.register');
    }

    public function loginForm()
    {
        return view('web.pages.auth.login');
    }

    public function register(Request $request)
    {
        Client::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'tel' => $request->tel,
        ]);
        return redirect()->route('client.login.form')->with(['success' => "تم التسجيل بنجاح"]);
    }

    public function login(Request $request)
    {
        if (auth()->guard('client')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->route('web.index')->with(['success' => 'مرحبا ' . auth()->guard('client')->user()->username . ' 😇']);
        } else {
            return redirect()->back()->with(['error' => '😕  ' . 'هناك خطا بالبيانات']);
        }
    }

    public function logout()
    {
        auth()->guard('client')->logout();
        Session::forget('yourKeyGoesHere');
        session()->regenerate();
        Artisan::call('cache:clear');
        return redirect()
            ->route('web.index')
            ->with(['success' => '☹️ ' . 'تم الخروج بنجاح']);
    }
}
