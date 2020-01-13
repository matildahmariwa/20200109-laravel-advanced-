<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{

    public function test_user_registration()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertSee('Register')
                ->type('name', 'jane')
                ->type('email', 'admin@2020')
                ->type('password', 'hey20')
                ->type('confirm_password', 'hey20')
                ->click('button[type="submit"]')
                ->assertSee("Dashboard");
        });
    }
}
