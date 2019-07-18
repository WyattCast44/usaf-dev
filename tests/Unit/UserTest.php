<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Reference\Gender;

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

    public function test_a_user_can_have_a_gender()
    {
        // Given me have a user
        $user = create(User::class);

        // By default they don't have a gender set
        $this->assertEquals(null, $user->gender);

        // But they can have a gender
        $gender = create(Gender::class);

        $user->update([
            'gender_id' => $gender->id,
        ]);

        $this->assertEquals($gender->id, $user->refresh()->gender->id);
    }

    public function test_if_a_user_updates_thier_email_it_becomes_unverified()
    {
        // Given me have a user
        $user = create(User::class);

        // And we update thier email, with a valid email
        $status = $user->updateEmail('test.email.2@gmail');

        // The status should be unsuccessful
        $this->assertFalse($status);
    }

    public function test_if_a_user_updates_thier_email_it_has_to_pass_validation()
    {
        // Given me have a user
        $user = create(User::class);

        // And we update thier email, with a valid email
        $status = $user->updateEmail('test.email.2@us.af.mil');

        // The status should be successfull
        $this->assertTrue($status);

        // And the email verified flag should be false
        $this->assertEquals(null, $user->email_verified_at);
    }
}
