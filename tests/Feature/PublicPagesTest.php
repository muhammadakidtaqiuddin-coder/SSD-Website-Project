<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_page_returns_ok(): void
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_about_page_returns_ok(): void
    {
        $this->get('/about')->assertStatus(200);
    }

    public function test_fleet_page_returns_ok(): void
    {
        $this->get('/fleet')->assertStatus(200);
    }

    public function test_offers_page_returns_ok(): void
    {
        $this->get('/offers')->assertStatus(200);
    }

    public function test_blog_page_returns_ok(): void
    {
        $this->get('/blog')->assertStatus(200);
    }

    public function test_team_page_returns_ok(): void
    {
        $this->get('/team')->assertStatus(200);
    }

    public function test_contact_page_returns_ok(): void
    {
        $this->get('/contact')->assertStatus(200);
    }

    public function test_cars_page_returns_ok(): void
    {
        $this->get('/cars')->assertStatus(200);
    }
}
