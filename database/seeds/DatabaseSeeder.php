<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(userSeeder::class);
         $this->call(motorbikeSeeder::class);
//         $this->call(roleSeeder::class);
    }
}
