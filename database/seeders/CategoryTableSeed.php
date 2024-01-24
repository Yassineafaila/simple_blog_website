<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create(["name" => "Technology"]);
        Category::create(["name" => "Science"]);
        Category::create(["name" => "Art"]);
        Category::create(["name" => "Business"]);
        Category::create(["name" => "Health"]);

        Category::create(["name" => "Sports"]);
        Category::create(["name" => "Travel"]);
        Category::create(["name" => "Food"]);
        Category::create(["name" => "Fashion"]);
        Category::create(["name" => "Entertainment"]);
    }
}
