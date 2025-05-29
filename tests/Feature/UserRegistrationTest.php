<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_phone_number_format()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '+9771234567890',
            'address' => 'Test Address',
            'terms' => true,
        ]);

        $response->assertStatus(201); // Assert that the user is created successfully

        // Test invalid phone number
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '1234567890', // Invalid format
            'address' => 'Test Address',
            'terms' => true,
        ]);

        $response->assertSessionHasErrors('phone'); // Assert that validation fails for phone
    }
}
