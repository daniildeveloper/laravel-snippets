<?php

use Illuminate\Database\Seeder;
use App\HaypItems as Item;

class HaypItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item                  = new Item();
        $item->title           = "First item";
        $item->description     = "First demo item";
        $item->price           = 1000;
        $item->profit_pro_hour = 150 / 24;
        $item->save();

        $item1                  = new Item();
        $item1->title           = "Second item";
        $item1->description     = "Second demo item";
        $item1->price           = 2000;
        $item1->profit_pro_hour = 320 / 24;
        $item1->save();
    }
}
