<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfirmEmailTest extends TestCase
{
    /** @test */
    public function a_user_can_confirm_email()
    {
        $this->withoutExceptionHandling();

        $user = create(User::class);

        $this->get('/register/confirm/?token=' . $user->confirm_token)
            ->assertRedirect('/')
            ->assertSessionHas('success', 'Your email has been confirmed.');

        $this->assertTrue($user->fresh()->isConfirmed());
    }

    /** @test */
    public function a_user_is_redirected_id_token_is_wrong()
    {
        $user = create(User::class);

        $this->get('/register/confirm/?token=WRONG_TOKEN')
            ->assertRedirect('/')
            ->assertSessionHas('error', 'Confirmation token not recognized.');


    }
}
