<?php

use Illuminate\Database\Seeder;
use App\Region;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arreglo = array('RonBailable', 'Peor es Na', 'Mala Semilla', 'Llo-llo', 'Nilo',
            'Red Table', 'Tv Maldita', 'Overdosis', 'Dosis', 'Death Gate',
            'Aunefast', 'Tormento', 'Violencia Pacifica', 'Tejidos Bordados', 'Sencillo',
            'X.K.R', 'Portugal', 'Anquilador', 'Pirotecnia', 'Sauce',
            'Costillar Bailable', 'Servicio Hogareño', 'Turba Explosiva', 'Bosque Maldito', 'Tortuga Veloz',
            'Inoloro', 'Silencio Bordado', 'Estigma Voraz', 'Dinamita', 'K.O.P');


        for($i=0; $i<30; $i++){
            DB::table('users')->insert([
                'name' => str_random(5),
                'email' => str_random(8).'@gmail.com',
                'password' => bcrypt('123456'),
            ]);

            DB::table('banda')->insert([
                'id_usuario' => $i,
                'id_ciudad' => random_int(1,344),
                //'id_region' => $this->obtenerRegion('id_ciudad'),
                'id_lirica' => random_int(1,26),
                'id_genero' => random_int(1,74),
                'nombre' =>  $arreglo[$i],
                'descripcion' => 'somos una banda que participa en esta prueba',
                'imagen' => 'uploads/bandas/default.jpg',
            ]);
        }
    }

    /*public function obtenerRegion($ciudad){

        $valor = Region::where('id', '=', $ciudad->id_region)->get();

        return $valor->id;
    }*/

}
