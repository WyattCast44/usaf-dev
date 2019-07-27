<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Events\Users\UserRegistered;

class UserEventSubscriber
{
    /**
     * Handle user registered events.
     */
    public function handleUserRegistration($event)
    {
        event(new UserRegistered($event->user));
    }

    /**
     * Handle user email verified events.
     */
    public function handleUserEmailVerification($event)
    {
        //
    }

    /**
     * Handle user login events.
     */
    public function handleUserLogin($event)
    {
        event(new UserLoggedIn($event->user));

        $event->user->update(['last_login' => now()]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@handleUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Registered',
            'App\Listeners\UserEventSubscriber@handleUserRegistration'
        );
    }
}
