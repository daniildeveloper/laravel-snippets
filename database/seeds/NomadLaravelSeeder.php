<?php

use App\Http\Controllers\NomadLaravelController;
use Illuminate\Database\Seeder;

class NomadLaravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = new NomadLaravelController();
        $n->index();
    }
}
