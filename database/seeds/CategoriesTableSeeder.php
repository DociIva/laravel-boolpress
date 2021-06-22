<?php

use Illuminate\Database\Seeder;
//creato con la migration model secco
use App\Category;
//SLUG STR
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['HTML', 'CSS', 'JavaScript', 'PHP'];

        foreach ($categories as $category) {
            //1 Instanza
            $new_category = new Category();

            //2
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');

            //3
            $new_category->save();
        }
    }
}
