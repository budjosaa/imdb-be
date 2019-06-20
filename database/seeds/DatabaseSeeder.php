<?php

use Illuminate\Database\Seeder;
use App\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['name'=>'action']);
        Genre::create(['name'=>'horror']);
        Genre::create(['name'=>'drama']);
        Genre::create(['name'=>'triler']);
        Genre::create(['name'=>'comedy']);
        Genre::create(['name'=>'romance']);
        $this->call(UsersTableSeeder::class);
        $this->call(MovieTableSeeder::class);
        


    }
}
