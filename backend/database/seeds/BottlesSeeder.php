<?php

use Illuminate\Database\Seeder;
use App\Bottle;

class BottlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bottle::create([
            'name'=>"szklana",
            'points'=>100,
            'color'=>"blue",
        ]);
        Bottle::create([
            'name'=>"plastikowa",
            'points'=>50,
            'color'=>"lime",
        ]);
        Bottle::create([
            'name'=>"puszka",
            'points'=>75,
            'color'=>"grey",
        ]);


    }
}
