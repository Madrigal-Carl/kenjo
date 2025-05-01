<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_registers_a_user_successfully()
    {
        $response = $this->post('/signup', [
            'fullname' => 'Juan Dela Cruz',
            'phone_number' => '09171234567',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/signin');
        $this->assertDatabaseHas('users', [
            'fullname' => 'Juan Dela Cruz',
            'phone_number' => '09171234567',
        ]);
    }

    public function test_register_validation_fails()
    {
        $response = $this->post('/signup', [
            'fullname' => '',
            'phone_number' => '',
            'password' => 'pass',
            'password_confirmation' => 'mismatch',
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_login_successful()
    {
        $user = User::create([
            'fullname' => 'Maria Clara',
            'phone_number' => '09987654321',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this->post('/signin', [
            'phone_number' => '09987654321',
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_fails_with_wrong_password()
    {
        $user = User::create([
            'fullname' => 'Andres Bonifacio',
            'phone_number' => '09170000000',
            'password' => Hash::make('correct-password'),
        ]);

        $response = $this->post('/signin', [
            'phone_number' => '09170000000',
            'password' => 'wrong-password',
        ]);

        $response->assertRedirect(); // back to form
        $this->assertGuest();
    }

    public function test_logout()
    {
        $user = User::create([
            'fullname' => 'Test User',
            'phone_number' => '09179999999',
            'password' => Hash::make('password123'),
        ]);
    
        $this->actingAs($user);
    
        $response = $this->post('/signout');
    
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
