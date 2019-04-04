<?php

use Illuminate\Database\Seeder;
use Sgsi\Dominios;

class DominioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dominios::class, 10)->create();
    }
}

/* NO SE PUDIERON CREAR LOS SEEDER POR ERROR EN LA CONFIGURACION DEL ARCHIVO */