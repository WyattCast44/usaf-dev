<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Rules\AllowedDomain;

class AllowedDomainsTest extends TestCase
{
    public function test_a_valid_email_passes()
    {
        $validEmail = 'first.last@us.af.mil';

        $this->assertTrue((new AllowedDomain)->passes('email', $validEmail));
    }

    public function test_an_invalid_email_fails()
    {
        $invalidEmail = 'first.last@gmail.com';

        $this->assertEquals(false, ((new AllowedDomain)->passes('email', $invalidEmail)));
    }
}
