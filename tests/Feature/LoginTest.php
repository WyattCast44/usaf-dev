<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Users\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_can_with_valid_creds()
    {
        // Given we have a user
        $user = create(User::class, ['email' => 'email@us.af.mil']); // password = password
        
        // And we attempt to login
        $this->get('/login');

        $res = $this->post('/login', ['email' => $user->email, 'password' => 'password']);

        // We should redirected to the "home" page
        $res->assertRedirect('/dashboard');

        // And we should be logged in
        $this->assertAuthenticated('web');
    }

    public function test_a_user_cannont_login_with_invalid_creds()
    {
        // Given we have a user
        $user = create(User::class, ['email' => 'email@us.af.mil']); // password = password
        
        // And we attempt to login
        $this->get('/login');

        $res = $this->post('/login', ['email' => $user->email, 'password' => 'password1']);

        // We should redirected back to the login page
        $res->assertRedirect('/login');
    }

    public function test_when_a_user_logs_in_the_last_login_field_is_updated()
    {
        // Given we have a user
        $user = create(User::class, ['email' => 'email@us.af.mil']); // password = password
        
        // And we attempt to login
        $this->get('/login');

        $res = $this->post('/login', ['email' => $user->email, 'password' => 'password']);

        // We should redirected to the "home" page
        $res->assertRedirect('/dashboard');

        // And we should be logged in
        $this->assertAuthenticated('web');

        // And our last_login should be not be null
        $this->assertNotNull($user->refresh()->last_login);
    }
}
