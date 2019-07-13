<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_be_made_an_admin()
    {
        // Given we have a user
        $nonAdmin = create(User::class);

        // They should not be an admin
        $this->assertEquals(false, $nonAdmin->isAdmin());

        // But we can make them an admin
        $admin = $nonAdmin->makeAdmin();

        // They should be an admin
        $this->assertTrue($admin->isAdmin());
    }

    public function test_an_admin_user_can_be_made_not_an_admin()
    {
        // Given we have a user who is an admin
        $admin = create(User::class)->makeAdmin();

        // When we remove the admin flag
        $admin->removeAdmin();

        // They should no longer be and admin
        $this->assertFalse($admin->isAdmin());
    }
}
