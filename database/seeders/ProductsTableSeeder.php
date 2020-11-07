<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\ProductImage::factory(200)->create(); */

        $categories = \App\Models\Category::factory(5)->create();
        $categories->each(function($category){
            $products = \App\Models\Product::factory(20)->make();
            $category->products()->saveMany($products);

            $products->each(function($p){
                $images = \App\Models\ProductImage::factory(5)->make();
                $p->images()->saveMany($images);
            });
        }); 
    }
}
