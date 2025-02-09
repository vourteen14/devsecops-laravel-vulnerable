<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_registers_a_new_user()
    {
        $response = $this->postJson('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    /** @test */
    public function it_requires_valid_email_for_registration()
    {
        $response = $this->postJson('/register', [
            'name' => 'Invalid Email',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');
    }

    /** @test */
    public function it_logs_in_a_user()
    {
        $user = User::factory()->create([
            'email' => 'login@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/login', [
            'email' => 'login@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_prevents_brute_force_login()
    {
        $email = 'fail@example.com';
        
        foreach (range(1, 5) as $attempt) {
            $this->postJson('/login', [
                'email' => $email,
                'password' => 'wrongpassword',
            ]);
        }

        $response = $this->postJson('/login', [
            'email' => $email,
            'password' => 'wrongpassword',
        ]);
        
        $response->assertStatus(429); // Too many requests
    }
}