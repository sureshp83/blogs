<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => "News"
        ]);

        DB::table('categories')->insert([
            'category_name' => "Social Media"
        ]);

        DB::table('categories')->insert([
            'category_name' => "E-Commerce"
        ]);

        DB::table('categories')->insert([
            'category_name' => "Festivals"
        ]);

        DB::table('categories')->insert([
            'category_name' => "Politics"
        ]);

        DB::table('categories')->insert([
            'category_name' => "General"
        ]);
    }
}
