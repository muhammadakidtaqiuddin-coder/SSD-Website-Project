<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $this->assertAuthenticated();

        // Change if your app redirects elsewhere
        $response->assertRedirect('/');
    }

    public function test_registration_fails_with_duplicate_email(): void
    {
        User::factory()->create([
            'email' => 'taken@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'Another User',
            'email' => 'taken@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $this->assertGuest();

        $response->assertSessionHasErrors('email');
    }
}

