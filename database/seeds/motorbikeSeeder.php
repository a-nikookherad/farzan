<?php

use Illuminate\Database\Seeder;

class motorbikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\motorbike::truncate();
        factory(\App\motorbike::class,10)->create();
    }
}
