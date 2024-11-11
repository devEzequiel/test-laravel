<?php

namespace Tests\Unit\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'test@testing.com',
            'password' => Hash::make('123'),
        ]);

        $response = $this->postJson(route('auth.login'), [
            'email' => 'test@testing.com',
            'password' => '123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
            ]);

        $this->assertNotNull($user->tokens()->first());
    }
}
