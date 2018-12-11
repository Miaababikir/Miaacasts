<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function a_user_see_correct_message_when_passing_in_wrong_credentials()
    {
        $response = $this->postJson('/login', [
            'email' => 'katrina31@example.com',
            'password' => 'wrong-password'
        ]);

        $response->assertStatus(422);

    }

    /** @test */
    public function correct_response_after_user_logs_in()
    {
        $user = create('App\User');

        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response->assertStatus(200)
            ->assertSessionHas('success', 'Successfully logged in.');

    }
}
