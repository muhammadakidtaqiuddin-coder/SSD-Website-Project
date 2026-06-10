<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessControlTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_page_requires_authentication(): void
    {
        $response = $this->get('/booking');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_booking_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/booking');
        $response->assertStatus(200);
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_access_bookings_resource(): void
    {
        $response = $this->get('/bookings');
        $response->assertRedirect('/login');
    }
}
