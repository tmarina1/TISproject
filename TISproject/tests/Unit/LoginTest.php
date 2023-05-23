<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testLogin()
    {
        $this->post('/login', [
            'email' => 'tomasmaaa@eafit.edu.co',
            'password' => '43545654',
        ]);

        $this->assertGuest();
    }
}
