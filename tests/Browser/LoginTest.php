<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Users\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
   
    public function test_a_user_can_login()
    {
        $user = create(User::class);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('login'))
                ->type('email', $user->email)
                ->type('password', 'password')
                ->check('remember')
                ->click('#login');
        });
    }
}
