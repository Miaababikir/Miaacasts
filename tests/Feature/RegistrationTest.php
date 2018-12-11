<?php

namespace Tests\Feature;

use App\Mail\ConfirmYourEmail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    /** @test */
    public function user_has_default_name_after_registration()
    {
        $this->post('/register', [
            'name' => 'Mosab Ibrahim',
            'email' => 'miaababikir@gmail.com',
            'password' => 'secret'
        ])
            ->assertRedirect();

        $this->assertDatabaseHas('users', [
            'username' => str_slug('Mosab Ibrahim')
        ]);

    }

    /** @test */
    public function an_email_is_send_to_new_registered_user()
    {
        Mail::fake();

        $this->post('/register', [
            'name' => 'Mosab Ibrahim',
            'email' => 'miaababikir@gmail.com',
            'password' => 'secret'
        ]);

        Mail::assertSent(ConfirmYourEmail::class);


    }

}

