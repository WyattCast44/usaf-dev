<?php

namespace App\Utilities;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            $this->prod();

            return;
        }

        $this->dev();
    }

    public function prod()
    {
        return;
    }

    public function dev()
    {
        return;
    }
}
