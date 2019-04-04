<?php

use Illuminate\Database\Seeder;
use Sgsi\Preguntas;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Preguntas::class, 10)->create();
    }
}
