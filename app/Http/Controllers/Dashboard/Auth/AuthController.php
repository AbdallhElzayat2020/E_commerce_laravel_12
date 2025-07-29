<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller implements HasMiddleware
{

    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

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
        $remember = $request->remember;

        if ($this->authService->login($credentials, 'admin', $remember)) {
            flash()->success(__('auth.success_login'));
            return redirect()->intended(route('dashboard.welcome'));
        }
        return redirect()->back()->withErrors(['email' => __('auth.not_match')]);
    }

    public function logout()
    {
        $this->authService->logout('admin');
        flash()->success(__('auth.success_logout'));
        return redirect()->route('dashboard.login');
    }

}
