<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SaleItems;
use App\Models\Sales;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $fakeCount = 10;
        Category::factory($fakeCount)->create();
        Supplier::factory($fakeCount)->create();
        Customer::factory($fakeCount)->create();
        Product::factory()->count($fakeCount)->create()->each(function ($product) use($fakeCount) {
            $product->category_id = rand(1, $fakeCount);
            $product->supplier_id = rand(1, $fakeCount);
            $product->save();
        });;
        Sales::factory()->count($fakeCount)->create()->each(function ($sales) use($fakeCount) {
            $sales->customer_id = rand(1, $fakeCount);
            $sales->save();
        });;
        SaleItems::factory()->count($fakeCount)->create()->each(function ($saleItems) use($fakeCount) {
            $saleItems->sale_id = rand(1, $fakeCount);
            $saleItems->product_id = rand(1, $fakeCount);
            $saleItems->save();
        });;
    }
}
