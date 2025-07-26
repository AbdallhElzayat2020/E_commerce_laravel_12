<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ForgetPasswordRequest;
use App\Http\Requests\Dashboard\VerifyOtpRequest;
use App\Models\Admin;
use App\Notifications\Dashboard\SendOtpNotification;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{

    public $otp_code;

    public function __construct()
    {
        $this->otp_code = new Otp();
    }

    public function showForgetPasswordForm()
    {
        return view('dashboard.auth.password.forget-password');
    }

    public function sendEmailResetLink(ForgetPasswordRequest $request)
    {
        $admin = Admin::whereEmail($request->email)->first();
        if (!$admin) {
            return back()->withErrors(['email' => __('auth.not_match')]);
        }

        $admin->notify(new SendOtpNotification());

        return to_route('dashboard.password.show-otp-form', ['email' => $request->email])
            ->withErrors('success', __('auth.otp_msg'));
    }

    public function showOtpForm($email)
    {
        return view('dashboard.auth.password.show-otp-form', ['email' => $email]);
    }

    public function verifyOtpForm(VerifyOtpRequest $request)
    {
        $otp = $this->otp_code->validate($request->email, $request->otp);

        if (!$otp->status) {
            return redirect()->back()->withErrors(['error' => 'Invalid OTP, please try again.']);
        }

        return to_route('dashboard.password.show-reset-password-form', ['email' => $request->email])
            ->with('success', 'OTP verified successfully. You can now reset your password.');
    }

}
