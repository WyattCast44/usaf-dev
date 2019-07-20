<?php

use App\Models\Users\User;
use App\Utilities\DatabaseSeeder as BaseSeeder;

class UsersTableSeeder extends BaseSeeder
{
    public function dev()
    {
        $this->createDefaultUser();

        factory(User::class, 20)->create();
    }

    public function prod()
    {
        $this->createDefaultUser();
    }

    public function createDefaultUser()
    {
        factory(User::class)->create([
            'first_name' => 'Wyatt',
            'middle_name' => null,
            'last_name' => 'Castaneda',
            'suffix' => '',
            'nickname' => 'Wyatt',
            'email' => "wyatt.castaneda.1@us.af.mil",
            'email_verified_at' => now(),
            'date_of_birth' => null,
            'gender_id' => null,
            'avatar' => null,
            'password' => bcrypt('password'),
            'password_reset_required' => true,
            'last_password_reset' => null,
            'last_login' => null,
            'admin' => true
        ]);
    }
}
