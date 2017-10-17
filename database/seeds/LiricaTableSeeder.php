<?php

use Illuminate\Database\Seeder;

class LiricaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lirica')->insert([
        	'nombre' => 'Abstracto',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Amor',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Ateismo',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Batallas Epicas',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Ciencia Ficcion',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Comedia',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Critica Social',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Emociones',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Enfermedades',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Fantasia',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Gore',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Guerra',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Leyendas',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Mitologia',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Muerte',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Ocultismo',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Politica',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Psicologia',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Religion',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Satanica',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Satira',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Surrealismo',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Topicos Personales',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Universos Paralelos',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Vida',
        ]);
        DB::table('lirica')->insert([
        	'nombre' => 'Violencia',
        ]);

    }
}
