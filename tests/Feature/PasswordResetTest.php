<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_password_resets_are_disabled_user_is_redirected()
    {
        // Given password resets are closed
        config()->set('settings.allow-password-resets', false);

        // And we visit the password reset page
        $res = $this->get('/password/reset');
        
        // We should be redirected to the login page
        $res->assertRedirect('login');
    }

    public function test_if_password_resets_are_enabled_user_can_view_page()
    {
        // Given password resets are closed
        config()->set('settings.allow-password-resets', true);

        // And we visit the password reset page
        $res = $this->get('/password/reset');
        
        // We should be redirected to the login page
        $res->assertOk();
    }
}
