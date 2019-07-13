<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_registration_is_disabled_user_is_redirected()
    {
        // Given registration is closed
        config()->set('settings.open-registration', false);

        // And we visit the registation page
        $res = $this->get('/register');
        
        // We should be redirected to the login page
        $res->assertRedirect('login');
    }

    public function test_if_registration_is_enabled_user_can_view_page()
    {
        // Given registration is open
        config()->set('settings.open-registration', true);

        // And we visit the registation page
        $res = $this->get('/register');
        
        // We should be redirected to the login page
        $res->assertOk();
    }

    public function test_a_user_can_register_with_valid_email()
    {
        // Given registration is open
        config()->set('settings.open-registration', true);

        // Given we have proper data
        $attr = [
            'first_name' => 'Wyatt',
            'last_name' => 'Castaneda',
            'middle_name' => '',
            'email' => 'valid@us.af.mil',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        // And we attempt to register
        $res = $this->post('/register', $attr);

        // We should redirected to the "home" page
        $res->assertRedirect('/home');

        // And the database should have the new user
        $this->assertDatabaseHas('users', ['email' => $attr['email']]);

        // And we should be logged in
        $this->assertAuthenticated('web');
    }

    public function test_a_user_cannot_register_with_invalid_email()
    {
        // Given registration is open
        config()->set('settings.open-registration', true);
        
        // Given we have invalid data
        $attr = [
            'first_name' => 'Wyatt',
            'last_name' => 'Castaneda',
            'middle_name' => 'test',
            'email' => 'not.valid@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        // And we attempt to register
        $res = $this->post('/register', $attr);

        // We should redirected back to the
        $res->assertRedirect('/');

        // And the database should not have a new user
        $this->assertDatabaseMissing('users', ['email' => $attr['email']]);
    }
}
