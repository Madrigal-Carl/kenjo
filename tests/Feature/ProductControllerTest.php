<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_products()
    {
        Product::create([
            'name' => 'Product 1',
            'details' => 'Some details',
            'price' => 100,
            'category' => 'Category A',
            'image' => 'assets/images/product.png'
        ]);

        Product::create([
            'name' => 'Product 2',
            'details' => 'Other details',
            'price' => 150,
            'category' => 'Category B',
            'image' => 'assets/images/product.png'
        ]);

        $response = $this->getJson('/products');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

    public function test_index_with_category_filter()
    {
        Product::create([
            'name' => 'Filtered Product',
            'details' => 'Details',
            'price' => 200,
            'category' => 'Electronics',
            'image' => 'assets/images/product.png'
        ]);

        Product::create([
            'name' => 'Other Product',
            'details' => 'Details',
            'price' => 300,
            'category' => 'Toys',
            'image' => 'assets/images/product.png'
        ]);

        $response = $this->getJson('/products?category=Electronics');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['category' => 'Electronics']);
    }

    public function test_store_product_successfully()
    {
        $response = $this->postJson('/products', [
            'name' => 'New Product',
            'details' => 'Product details',
            'price' => 250,
            'category' => 'Books'
        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment(['message' => 'Product has been added successfully.']);
        $this->assertDatabaseHas('products', ['name' => 'New Product']);
    }

    public function test_store_product_validation_fails()
    {
        $response = $this->post('/products', [
            'name' => '',
            'details' => 'Missing fields test',
            'price' => 'string',
            'category' => ''
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors']);
    }
}
