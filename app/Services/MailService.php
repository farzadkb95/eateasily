<?php

namespace App\Services;

use App\Mail\TestCode;
use Mail;

class MailService
{
    public function sendCode(string $to, int $code)
    {
        Mail::to($to)
            ->send(new TestCode($code));
    }
}