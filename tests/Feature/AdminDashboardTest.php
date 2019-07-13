<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Users\User;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_users_can_view()
    {
        // Given we have an admin user
        $admin = create(User::class)->makeAdmin();

        // And we are signed in
        $this->signIn($admin);

        // And we visit the admin dashbaord
        $res = $this->get(route('admin.dashboard'));

        // We should get a ok response
        $res->assertOk();
    }

    public function test_non_admin_users_cannot_view()
    {
        // Given we have an standard user
        $nonAdmin = create(User::class);

        // And we are signed in
        $this->signIn($nonAdmin);

        // And we visit the admin dashbaord
        $res = $this->get(route('admin.dashboard'));

        // We should get a ok response
        $res->assertStatus(403);
    }
}
