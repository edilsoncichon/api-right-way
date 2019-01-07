<?php

namespace Tests\Feature;

use App\Domains\Category\Category;
use App\Domains\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\JwtAuthentication;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use DatabaseMigrations,
        JwtAuthentication;

    protected $endpointUri = '/v1/categories';

    public function test_get_with_user_not_auth()
    {
        $response = $this->get($this->endpointUri);
        $response->assertStatus(401);
    }

    public function test_get_categories()
    {
        $categories = factory(Category::class, 15)->create();
        $user = factory(User::class)->create();
        $data = $this->actingAs($user)
                     ->get($this->endpointUri)
                     ->assertOk()->json('data');
        $this->assertEquals($categories[0]->id, $data[0]['id']);
    }

    public function test_get_category()
    {
        $category = factory(Category::class)->create();
        $user = factory(User::class)->create();
        $data = $this->actingAs($user)
            ->get($this->endpointUri . '/' . $category->id)
            ->assertOk()
            ->json('data');
        $this->assertEquals($category->id, $data['id']);
        $this->assertEquals($category->name, $data['name']);
        $this->assertEquals($category->name_slug, $data['name_slug']);
    }

    public function test_create_category_with_valid_fields()
    {
        $user = factory(User::class)->create();
        $data = factory(Category::class)->make()->toArray();
        $this->actingAs($user)
            ->post($this->endpointUri, $data)
            ->assertOk()
            ->assertSee('name');
    }

    public function test_create_category_with_invalid_fields()
    {
        $user = factory(User::class)->create();
        $data = factory(Category::class)->make(['name' => null])->toArray();
        $this->actingAs($user)
            ->post($this->endpointUri, $data)
            ->assertStatus(422);
    }

    public function test_update_category()
    {
        $user = factory(User::class)->create();
        $data = factory(Category::class)->create()->toArray();

        $this->actingAs($user)
            ->put($this->endpointUri, $data)
            ->assertOk()
            ->assertSee('name');
    }

    public function test_delete_category()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
        $this->actingAs($user)
            ->delete($this->endpointUri . '/' . $category->id)
            ->assertOk()
            ->assertSee('user_message');
    }
}
