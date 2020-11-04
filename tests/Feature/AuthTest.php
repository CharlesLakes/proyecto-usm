<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function testLoginAndLogout(){
        $this->visit('login')
            ->type('example@example.com','email')
            ->type('12345678','password')
            ->press('login')
            ->seePageIs('logout');
    }
}
