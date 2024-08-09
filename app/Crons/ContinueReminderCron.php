<?php

namespace App\Crons;

use App\Services\TestService;

class ContinueReminderCron
{
    public function __invoke(TestService $testService)
    {
        $testService->reminderAlert();
    }
}
