<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ForgetPasswordRequest;
use App\Http\Requests\Dashboard\VerifyOtpRequest;
use App\Models\Admin;
use App\Notifications\Dashboard\SendOtpNotification;
use App\Services\Auth\PasswordService;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{

    public $otp_code;

    protected PasswordService $PasswordRepository;

    public function __construct(PasswordService $PasswordRepository)
    {
        $this->otp_code = new Otp();
        $this->PasswordRepository = $PasswordRepository;
    }

    public function showForgetPasswordForm()
    {
        return view('dashboard.auth.password.forget-password');
    }

    public function sendEmailResetLink(ForgetPasswordRequest $request)
    {
        $admin = $this->PasswordRepository->sendOtp($request->email);
        if (!$admin) {
            return redirect()->back()->withErrors(['email' => 'this email does not exist']);
        }

        return to_route('dashboard.password.show-otp-form', ['email' => $request->email])
            ->withErrors('success', __('auth.otp_msg'));
    }

    public function showOtpForm($email)
    {
        return view('dashboard.auth.password.show-otp-form', ['email' => $email]);
    }

    public function verifyOtpForm(VerifyOtpRequest $request)
    {
        $otp = $this->PasswordRepository->verifyOtpForm($request->email, $request->otp);

        if (!$otp->status) {
            return redirect()->back()->withErrors(['error' => 'Invalid OTP, please try again.']);
        }

        return to_route('dashboard.password.show-reset-password-form', ['email' => $request->email])
            ->with('success', 'OTP verified successfully. You can now reset your password.');
    }

}
