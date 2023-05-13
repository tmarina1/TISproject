<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

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