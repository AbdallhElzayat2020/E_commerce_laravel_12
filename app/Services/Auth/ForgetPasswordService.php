<?php

namespace App\Services\Auth;

use App\Notifications\Dashboard\SendOtpNotification;
use App\Repositories\Auth\ForgetPasswordRepository;

class ForgetPasswordService
{

    protected ForgetPasswordRepository $forgetPasswordRepository;

    public function __construct(ForgetPasswordRepository $forgetPasswordRepository)
    {
        $this->forgetPasswordRepository = $forgetPasswordRepository;
    }

    public function sendOtp($email)
    {
        $admin = $this->forgetPasswordRepository->sendOtp($email);
        if (!$admin) {
            return false;
        }
        $admin->notify(new SendOtpNotification());
        return $admin;
    }

    public function verifyOtpForm($email, $otp)
    {
        $otp = $this->forgetPasswordRepository->verifyOtpForm($email, $otp);
        if (!$otp->status) {
            return false;
        }
        return $otp;
    }
}
