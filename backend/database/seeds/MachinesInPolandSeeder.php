<?php

use Illuminate\Database\Seeder;

class MachinesInPolandSeeder extends Seeder
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
