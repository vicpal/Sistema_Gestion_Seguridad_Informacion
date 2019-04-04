<?php

use Illuminate\Database\Seeder;
use Sgsi\Respuestas;

class RespuestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Respuestas::class, 10)->create();
    }
}
