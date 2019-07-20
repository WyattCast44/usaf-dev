<?php

namespace App\Listeners;

use App\Models\Passport\Token;
use Laravel\Passport\Events\AccessTokenCreated;

class RevokeAccessTokenWhenNewTokenCreated
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AccessTokenCreated $event)
    {
        Token::where('id', '<>', $event->tokenId)
            ->where('user_id', $event->userId)
            ->where('client_id', $event->clientId)
            ->update(['revoked' => true]);
    }
}
