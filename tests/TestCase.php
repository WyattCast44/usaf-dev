<?php

namespace Tests;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * A helper method for TestCase.php
     * to sign in a user
     */
    public function signIn(User $user = null)
    {
        $user = ($user <> null) ? $user : create(User::class);

        $this->actingAs($user);

        return $user;
    }
}
