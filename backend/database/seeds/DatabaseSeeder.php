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
         $this->call(UsersTableSeeder::class);
         $this->call(MachineTableSeeder::class);
         $this->call(BottlesSeeder::class);
         $this->call(MachinesInPoland::class);
//         $this->call(MachinesSeeder::class);
    }
}
