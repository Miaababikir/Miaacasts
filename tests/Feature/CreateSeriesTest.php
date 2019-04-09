<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSeriesTest extends TestCase
{
    /** @test */
    public function a_can_create_a_series()
    {
        $this->loginAdmin();

        Storage::fake(config('filesystems.default'));

        $this->post('/admin/series', [
            'title' => 'Vue js for the best',
            'description' => 'Lorem ipsum set meit',
            'image' => UploadedFile::fake()->image('image-series.png'),
        ])
            ->assertRedirect()
            ->assertSessionHas('success', 'Series created successfully');

        Storage::disk(config('filesystems.default'))
            ->assertExists('series/' . str_slug('Vue js for the best') . '.png');

        $this->assertDatabaseHas('series', ['slug' => str_slug('Vue js for the best')]);

    }

    /** @test */
    public function a_series_must_be_created_with_title()
    {
        $this->loginAdmin();

        try {
            $this->post('/admin/series', [
                'description' => 'Lorem ipsum set meit',
                'image' => UploadedFile::fake()->image('image-series.png'),
            ]);
        } catch (\Exception $exception) {
            $this->assertTrue($exception instanceof ValidationException);
        }
    }

    /** @test */
    public function a_series_must_be_created_with_description()
    {

        $this->loginAdmin();

        try {
            $this->post('/admin/series', [
                'title' => 'Lorem ipsum set meit',
                'image' => UploadedFile::fake()->image('image-series.png'),
            ]);
        } catch (\Exception $exception) {
            $this->assertTrue($exception instanceof ValidationException);
        }
    }

    /** @test */
    public function a_series_must_be_created_with_image()
    {

        $this->loginAdmin();

        try {
            $this->post('/admin/series', [
                'title' => 'Lorem ipsum set meit',
                'description' => 'Lorem ipsum set meit',
                'image' => 'STRING_INVALID_IMAGE'
            ]);
        } catch (\Exception $exception) {
            $this->assertTrue($exception instanceof ValidationException);
        }
    }

    /** @test */
    public function only_admin_can_create_series()
    {
        $this->actingAs(create(User::class));

        $this->post('/admin/series')
            ->assertSessionHas('error', 'You are not authorized to preform this action')
            ->assertRedirect('/');
    }
}
