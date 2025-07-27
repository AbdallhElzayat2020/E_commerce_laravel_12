<?php

namespace App\Services\Auth;

use App\Notifications\Dashboard\SendOtpNotification;
use App\Repositories\Auth\PasswordRepository;

class PasswordService
{

    protected PasswordRepository $PasswordRepository;

    public function __construct(PasswordRepository $PasswordRepository)
    {
        $this->PasswordRepository = $PasswordRepository;
    }

    public function sendOtp($email)
    {
        $admin = $this->PasswordRepository->getAdminByEmail($email);
        if (!$admin) {
            return false;
        }
        $admin->notify(new SendOtpNotification());
        return $admin;
    }

    public function verifyOtpForm($email, $otp)
    {
        $otp = $this->PasswordRepository->verifyOtpForm($email, $otp);
        if (!$otp->status) {
            return false;
        }
        return $otp;
    }

    public function resetPassword($email, $password)
    {
        return $this->PasswordRepository->resetPassword($email, $password);
    }
}
