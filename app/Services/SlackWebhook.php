<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class SlackWebhook {
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
        $this->client = new Client([

        ]);
    }

    public function log($message)
    {
        $env = '[['.config('app.env').']]';
        return $this->send($env.' '.$message);
    }

    public function send($text)
    {
        try {
            $response = $this->client->request('POST', $this->url, [
                'json' => ['text' => $text],
            ]);
        } catch (ClientException $e) {
            // Do nothing
        }

        Log::info("Sent to Slack: " . $text, ['context' => 'Notifications']);
        return $response;
    }
}
