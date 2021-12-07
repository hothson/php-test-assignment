<?php

namespace App\Listeners;

use App\Services\SlackWebhook;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SendRegistrationSlackNotification {

    protected $slack;

    public function __construct(SlackWebhook $slack)
    {
        $this->slack = $slack;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $this->slack->log('User signed up: '.$event->user->email.' '.$event->user->name);
    }
}
