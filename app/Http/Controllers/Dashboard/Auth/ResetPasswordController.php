<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ResetPasswordRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($email)
    {
        return view('dashboard.auth.password.reset-password', ['email' => $email]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $admin = Admin::whereEmail($request->email)->first();
        if (!$admin) {
            return back()->withErrors(['email' => __('auth.not_match')]);
        }
        $admin->update([
            'password' => bcrypt($request->password),
        ]);
        return to_route('dashboard.login')
            ->with('success', __('auth.reset_password_success'));
    }
}
