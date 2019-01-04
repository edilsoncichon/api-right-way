<?php

namespace Tests\Feature;

use App\Domains\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\JwtAuthentication;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use DatabaseMigrations, JwtAuthentication;

    public function test_get_user_not_auth()
    {
        $response = $this->get('/v1/categories');
        $response->assertStatus(401);
    }

    public function test_get_user_auth()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->get('/v1/categories')
            ->assertStatus(200);
    }
}
