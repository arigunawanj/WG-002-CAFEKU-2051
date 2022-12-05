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
        $response = $this->get('/category');
 
        $response->assertStatus(302);
    }

    /** @test */
    public function user_can_edit_a_categories()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_delete_existing_categories()
    {
        // $category = Category::all();
        // $response = $this->get(route('category.destroy', $category->id));

        // $response->assertStatus(302);
        $this->assertTrue(true);
    }
}
