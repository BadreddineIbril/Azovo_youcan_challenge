<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
{
    // use RefreshDatabase; 
    use WithFaker; 

    /**
     * Test product creation
     *
     * @return void
     */
    public function testCreateProduct()
    {
        // $this->withoutRefreshDatabase();

        // --- Fake Data ---
        $name = $this->faker->name;
        $description = $this->faker->sentence;
        $price = $this->faker->randomFloat(2, 10, 100);
        $image = UploadedFile::fake()->image('product_image.jpg');
        $category_id = 1;

        // --- Create Product ---
        $response = $this->post(route('products.store'), [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $image,
            'category_id' => $category_id,
        ]);

        // --- Success Request ---
        $response->assertStatus(200); 
        return "Product created successfully";

    }
}
