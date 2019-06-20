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
        $genres=['action','horror','drama','triler','comedy','romance'];
        foreach ($genres as $genre) {
              Genre::create(['name'=>$genre]);
        }
        $this->call(UsersTableSeeder::class);
        $this->call(MovieTableSeeder::class);
        


    }
}
