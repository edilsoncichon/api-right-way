<?php

namespace Tests\Feature;

use App\Domains\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\JwtAuthentication;
use Tests\TestCase;

class JWTAuthTest extends TestCase
{
    use DatabaseMigrations,
        JwtAuthentication;

    private $endpointUri = '/v1/auth/';

    public function test_login()
    {
        $password = '123456';
        $user = factory(User::class)->create(['password' => Hash::make($password)]);
        $data = ['email' => $user->email, 'password' => $password];

        $token = $this->post($this->endpointUri . 'login', $data)
            ->assertStatus(200)
            ->assertSee('access_token')
            ->json('access_token');
        $this->assertNotEmpty($token);
        return $token;
    }

    public function test_login_with_invalid_credentials()
    {
        $user = factory(User::class)->create(['password' => Hash::make('correct_password')]);
        $data = ['email' => $user->email, 'password' => 'incorrect_password'];

        $this->post($this->endpointUri . 'login', $data)
             ->assertStatus(403)
             ->assertDontSee('access_token')
             ->assertSee('user_message');
    }

    public function test_login_validation_fields_fail()
    {
        $incorrectData = [
            'username' => 'admin',
            'passwd' => '123'
        ];
        $errors = $this->post($this->endpointUri . 'login', $incorrectData)
             ->assertStatus(422)
             ->assertSee('errors')
             ->json('errors');
        $this->assertArrayHasKey('email', $errors);
        $this->assertArrayHasKey('password', $errors);
    }

    public function test_logout()
    {
        $user = factory(User::class)->create();
        $token = $this->getTokenFromUser($user);
        $this->addAuthBearer($token)
             ->post($this->endpointUri . 'logout')
             ->assertOk()
             ->assertSee('user_message');
        $this->addAuthBearer($token)
             ->get($this->endpointUri . 'me')
             ->assertStatus(401);
    }

    public function test_logout_with_invalid_token()
    {
        $user = factory(User::class)->create();
        $invalidToken = 'INVALID_TOKEN' . $this->getTokenFromUser($user);
        $this->addAuthBearer($invalidToken)
            ->post($this->endpointUri . 'logout')
            ->assertStatus(401)
            ->assertSee('message');
    }

    public function test_refresh()
    {
        $token = $this->test_login();
        $newToken = $this->addAuthBearer($token)
            ->post($this->endpointUri . 'refresh')
            ->assertOk()
            ->assertSee('access_token')
            ->json('access_token');
        $this->assertTrue(strlen($newToken) > 10);
        $this->assertNotEquals($token, $newToken);
    }

    public function test_refresh_with_invalid_token()
    {
        $user = factory(User::class)->create();
        $invalidToken = 'INVALID_TOKEN_' . $this->getTokenFromUser($user);
        $this->addAuthBearer($invalidToken)
            ->post($this->endpointUri . 'refresh')
            ->assertStatus(401)
            ->assertSee('message');
    }
}
