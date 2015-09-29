<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * Test login
     */
    public function testLogin()
    {
        $this->visit('/auth/login')
            ->type('a.test@test.nl','email')
            ->type('test','password')
            ->press('Login')
            ->seePageIs('/');
    }
}
