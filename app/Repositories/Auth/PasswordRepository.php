<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;

class PasswordRepository
{
    public $otp_code;

    public function __construct()
    {
        $this->otp_code = new Otp();
    }

    public function getAdminByEmail($email)
    {
        $admin = Admin::whereEmail($email)->first();
        return $admin;
    }

    public function verifyOtpForm($email, $otp)
    {
        $otp = $this->otp_code->validate($email, $otp);
        return $otp;
    }


    public function resetPassword($email, $password)
    {
        $admin = self::getAdminByEmail($email);
        $admin = $admin->update([
            'password' => bcrypt($password),
        ]);
        return $admin;
    }
}