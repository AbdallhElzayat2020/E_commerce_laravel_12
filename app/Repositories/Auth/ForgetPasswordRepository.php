<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;

class ForgetPasswordRepository
{
    public $otp_code;

    public function __construct()
    {
        $this->otp_code = new Otp();
    }

    public function sendOtp($email)
    {
        $admin = Admin::whereEmail($email)->first();
        return $admin;
    }

    public function verifyOtpForm($email, $otp)
    {
        $otp = $this->otp_code->validate($email, $otp);
        return $otp;
    }
}