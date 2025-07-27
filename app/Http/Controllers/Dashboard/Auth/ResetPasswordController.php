<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ResetPasswordRequest;
use App\Models\Admin;
use App\Services\Auth\PasswordService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    public $passwordService;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    public function showResetPasswordForm($email)
    {
        return view('dashboard.auth.password.reset-password', ['email' => $email]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $admin = $this->passwordService->resetPassword($request->email, $request->password);

        if (!$admin) {
            return back()->withErrors(['email' => __('auth.not_match')]);
        }

        return to_route('dashboard.login')
            ->with('success', __('auth.reset_password_success'));
    }
}
