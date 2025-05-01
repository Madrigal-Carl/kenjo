<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('pages.home');
    }

    public function test_view_signin_when_guest()
    {
        $response = $this->get('/signin');

        $response->assertStatus(200);
        $response->assertViewIs('pages.signin');
    }

    public function test_view_signin_when_authenticated()
    {
        $user = User::create([
            'fullname' => 'John Doe',
            'phone_number' => '09123456789',
            'password' => bcrypt('password')
        ]);

        $this->actingAs($user);

        $response = $this->get('/signin');

        $response->assertRedirect('/');
    }

    public function test_view_signup_when_guest()
    {
        $response = $this->get('/signup');

        $response->assertStatus(200);
        $response->assertViewIs('pages.signup');
    }

    public function test_view_signup_when_authenticated()
    {
        $user = User::create([
            'fullname' => 'Jane Doe',
            'phone_number' => '09987654321',
            'password' => bcrypt('password')
        ]);

        $this->actingAs($user);

        $response = $this->get('/signup');

        $response->assertRedirect('/');
    }

    public function test_view_cart_when_authenticated()
    {
        $user = User::create([
            'fullname' => 'Cart User',
            'phone_number' => '09091234567',
            'password' => bcrypt('password')
        ]);

        $this->actingAs($user);

        $response = $this->get('/cart');

        $response->assertStatus(200);
        $response->assertViewIs('pages.cart');
    }

    public function test_view_cart_when_guest()
    {
        $response = $this->get('/cart');

        $response->assertRedirect('/signin');
    }
}
