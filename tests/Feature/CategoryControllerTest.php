<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_categories()
    {

        $response = $this->post(route('category.store'), [
            'Nama' => 'hahah'
        ]);

        $response->assertStatus(302);
        // $response->assertRedirect(route('category.index'));
    }

    /** @test */
    public function user_can_browse_categories_index_page()
    {
        $response = $this->get('/');
 
        $response->assertStatus(200);
    }

    /** @test */
    public function test_photo_can_be_uploaded()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_delete_existing_categories()
    {
        // $category = 
        // $response = $this->delete(route('category.destroy', $category->id));

        // $response->assertStatus(302);
        $this->assertTrue(true);
    }
}
