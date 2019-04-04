<?php

use Illuminate\Database\Seeder;
use Sgsi\Objcontrol;

class ObjcontrolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Objcontrol::class, 10)->create();
    }
}
