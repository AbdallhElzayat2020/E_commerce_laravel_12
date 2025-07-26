<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('guest:admin', except: ['logout']),
        ];
    }

    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function handleLogin(AdminLoginequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, true)) {
            flash()->success(__('auth.login_success'));
            return redirect()->intended(route('dashboard.welcome'));
        } else {
            return redirect()->back()->withErrors(['email' => __('auth.not_match')]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        flash()->success(__('auth.success_logout'));
        return redirect()->route('dashboard.login');
    }

}
