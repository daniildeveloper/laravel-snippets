<?php

use Illuminate\Database\Seeder;

//use ProductTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(NomadLaravelSeeder::class);
        // $this->call(NomadSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(HaypItemsSeeder::class);
    }
}
