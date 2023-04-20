<?php

/**
 * PHP version 9
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <fernandocarrillo@devvoper.com>
 * @license  https://none.org/licenses/ License
 * @link     http://localhost/
 */

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rutas')->insert(
            [
            'id'=> 1,
            'codigo' => 111111,
            'nombre'=> 'Ruta Sur'
            ]
        );
        DB::table('rutas')->insert(
            [
            'id'=> 2,
            'codigo' => 222222,
            'nombre'=> 'Ruta Centro'
            ]
        );
        DB::table('rutas')->insert(
            [
            'id'=> 3,
            'codigo' => 333333,
            'nombre'=> 'Ruta Norte'
            ]
        );
        DB::table('rutas')->insert(
            [
            'id'=> 4,
            'codigo' => 444444,
            'nombre'=> 'Ruta Oriente'
            ]
        );
        DB::table('rutas')->insert(
            [
            'id'=> 5,
            'codigo' => 555555,
            'nombre'=> 'Ruta Occidente'
            ]
        );
    }
}
