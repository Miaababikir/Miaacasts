<?php

namespace Tests\Feature;

use App\Mail\ConfirmYourEmail;
use App\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /** @test */
    public function user_has_default_name_after_registration()
    {
        Mail::fake();

        $this->withExceptionHandling();

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
    public function a_user_has_test_after_registration()
    {
        Mail::fake();

        $this->post('/register', [
            'name' => 'Mosab Ibrahim',
            'email' => 'miaababikir@gmail.com',
            'password' => 'secret'
        ]);

        $user = User::find(1);

        $this->assertNotNull($user->confirm_token);

        $this->assertFalse($user->isConfirmed());
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

