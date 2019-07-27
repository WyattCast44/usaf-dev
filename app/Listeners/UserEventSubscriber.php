<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Events\Users\UserRegistered;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleUserLogin($event)
    {
        // Emit Event
        event(new UserLoggedIn($event->user));

        // Update last login
        $event->user->update(['last_login' => now()]);
    }

    /**
     * Handle user registered events.
     */
    public function handleUserRegistration($event)
    {
        // Emit Event
        event(new UserRegistered($event->user));
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
