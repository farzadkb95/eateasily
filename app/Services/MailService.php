<?php

namespace App\Services;

use App\Mail\ContinueReminder;
use App\Mail\PayAlert;
use App\Mail\PayFailAlert;
use App\Mail\TestCode;
use Mail;

class MailService
{
    public function sendCode(string $to, int $code)
    {
        Mail::to($to)
            ->send(new TestCode($code));
    }

    public function sendPayAlert(string $to)
    {
        Mail::to($to)
            ->send(new PayAlert());
    }

    public function sendPayFailAlert(string $to)
    {
        Mail::to($to)
            ->send(new PayFailAlert());
    }

    public function continueReminder(string $to)
    {
        Mail::to($to)
            ->send(new ContinueReminder());
    }
}
