<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('region')->insert([
        	'nombre' => 'Tarapacá',
            'numero' => '1',
        ]);
         DB::table('region')->insert([
        	'nombre' => 'Antofagasta',
            'numero' => '2',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Atacama',
            'numero' => '3',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Coquimbo',
            'numero' => '4',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Valparaíso',
            'numero' => '5',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región del Libertador Gral. Bernardo O’Higgins',
            'numero' => '6',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región del Maule',
            'numero' => '7',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región del Biobío',
            'numero' => '8',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región de la Araucanía',
            'numero' => '9',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región de Los Lagos',
            'numero' => '10',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región Aisén del Gral. Carlos Ibáñez del Campo',
            'numero' => '11',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región de Magallanes y de la Antártica Chilena',
            'numero' => '12',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región Metropolitana de Santiago',
            'numero' => '13',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Región de Los Ríos',
            'numero' => '14',
        ]);
        DB::table('region')->insert([
        	'nombre' => 'Arica y Parinacota',
            'numero' => '15',
        ]);
    }
}





