<?php

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
        $this->call([
            // per poter lanciare il comando solo del seed | controllare anche l'ordine
            PostsTableSeeder::class,
            CategoriesTableSeeder::class,
            TagsTableSeeder::class,
        ]);
    }
}
