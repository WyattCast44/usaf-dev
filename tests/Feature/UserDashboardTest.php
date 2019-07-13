<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_verified_users_can_view()
    {
        // Given we have an verified user
        $user = create(User::class, ['email_verified_at' => now()]);

        // And we are signed in
        $this->signIn($user);

        // And we visit the dashbaord
        $res = $this->get(route('user.dashboard'));

        // We should get a ok response
        $res->assertOk();
    }

    public function test_unverified_users_cannot_view()
    {
        // Given we have an unverified user
        $user = create(User::class, ['email_verified_at' => null]);

        // And we are signed in
        $this->signIn($user);

        // And we visit the dashbaord
        $res = $this->get(route('user.dashboard'));

        // We should get a ok response
        $res->assertRedirect(route('verification.notice'));
    }
}
