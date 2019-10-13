<?php

use Illuminate\Database\Seeder;

class MachinesInPoland extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Machine::class,1000)->create();
    }
}
