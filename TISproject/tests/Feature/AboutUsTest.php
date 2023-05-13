<?php

namespace Tests\Feature;
use Tests\TestCase;

class AboutUsTest extends TestCase
{
    public function testAboutIsWorking(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }
}