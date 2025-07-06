<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product',
            'slug' => 'product',
            'status' => 1,
            'price' => 100.00,
            'is_featured' => 0,
            'stock_no' => '123',
            'description' => 'Eleve seu treino com a Camiseta Performance VALGRIT. Feita com tecido respirável e de secagem rápida, oferece conforto e liberdade de movimento incomparáveis. Design moderno e caimento perfeito para você superar seus limites.',
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Product1',
            'slug' => 'product1',
            'status' => 1,
            'price' => 200.00,
            'is_featured' => 0,
            'stock_no' => '1234',
            'description' => 'Eleve seu treino com a Camiseta Performance VALGRIT. Feita com tecido respirável e de secagem rápida, oferece conforto e liberdade de movimento incomparáveis. Design moderno e caimento perfeito para você superar seus limites.',
            'category_id' => 2
        ]);
        Product::create([
            'name' => 'Product2',
            'slug' => 'product2',
            'status' => 1,
            'price' => 1100.00,
            'is_featured' => 0,
            'stock_no' => '12340',
            'description' => 'Product description2',
            'category_id' => 3
        ]);
        Product::create([
            'name' => 'Product4',
            'slug' => 'product4',
            'status' => 1,
            'price' => 1100.00,
            'is_featured' => 0,
            'stock_no' => '1230',
            'description' => 'Product description2',
            'category_id' => 3
        ]);
        Product::create([
            'name' => 'Product5',
            'slug' => 'product5',
            'status' => 1,
            'price' => 1100.00,
            'is_featured' => 0,
            'stock_no' => '1231',
            'description' => 'Product description2',
            'category_id' => 3
        ]);
        Product::create([
            'name' => 'Product6',
            'slug' => 'product6',
            'status' => 1,
            'price' => 1100.00,
            'is_featured' => 0,
            'stock_no' => '12',
            'description' => 'Product description2',
            'category_id' => 3
        ]);
        Product::create([
            'name' => 'Product7',
            'slug' => 'product7',
            'status' => 1,
            'price' => 1100.00,
            'is_featured' => 0,
            'stock_no' => '1',
            'description' => 'Product description2',
            'category_id' => 3
        ]);
        Product::create([
            'name' => 'Product8',
            'slug' => 'product8',
            'status' => 1,
            'price' => 1100.00,
            'is_featured' => 0,
            'stock_no' => '12348',
            'description' => 'Product description2',
            'category_id' => 3
        ]);
    }
}
