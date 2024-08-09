<?php

namespace App\Services;

use IPPanel\Client;

class SmsService
{
    protected $apiKey;

    protected $from;

    protected $url = 'https://ippanel.com/patterns/pattern';

    public function __construct()
    {
        $this->apiKey = config('services.faraz_sms.api_key');
    }

    public function sendCode(string $to, int $code)
    {
        $client = new Client($this->apiKey);
        $pattern = '87dnobnyignnblw';

        $messageId = $client->sendPattern(
            $pattern,    // pattern code
            '+98EVENT',      // originator
            $to,  // recipient
            [
                'verification-code' => $code,
            ],  // pattern values
        );

        return $messageId;
    }

    public function sendPayAlert(string $to)
    {
        $client = new Client($this->apiKey);
        $pattern = 'zb7j4pq1h2rmo08';

        $messageId = $client->sendPattern(
            $pattern,    // pattern code
            '+98EVENT',      // originator
            $to,  // recipient
            [],  // pattern values
        );

        return $messageId;
    }

    public function continueReminder(string $to)
    {
        $client = new Client($this->apiKey);
        $pattern = 'oz04ebb68e3cjcw';

        $messageId = $client->sendPattern(
            $pattern,    // pattern code
            '+98EVENT',      // originator
            $to,  // recipient
            [],  // pattern values
        );

        return $messageId;
    }
}
