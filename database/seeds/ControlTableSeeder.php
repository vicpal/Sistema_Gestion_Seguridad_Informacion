<?php

use Illuminate\Database\Seeder;
use Sgsi\Control;

class ControlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Control::class, 10)->create();
    }
}
