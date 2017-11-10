<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'b',
            'email' => 'b@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'c',
            'email' => 'c@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'd',
            'email' => 'd@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'e',
            'email' => 'e@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'f',
            'email' => 'f@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'g',
            'email' => 'g@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'i',
            'email' => 'i@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'j',
            'email' => 'j@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'k',
            'email' => 'k@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'l',
            'email' => 'l@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'm',
            'email' => 'm@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'n',
            'email' => 'n@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'o',
            'email' => 'o@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'p',
            'email' => 'p@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'q',
            'email' => 'q@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'r',
            'email' => 'r@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 's',
            'email' => 's@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 't',
            'email' => 't@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'u',
            'email' => 'u@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'v',
            'email' => 'v@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'w',
            'email' => 'w@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'x',
            'email' => 'x@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'y',
            'email' => 'y@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'z',
            'email' => 'z@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('banda')->insert([
            'id_usuario' => '1',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '2',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '3',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '4',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '5',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '6',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '7',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '8',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '9',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '10',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '11',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '12',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '13',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '14',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '15',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '16',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '17',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '18',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '19',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '20',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '21',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '22',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
        DB::table('banda')->insert([
            'id_usuario' => '23',
            'id_ciudad' => random_int(1,344),
            'id_lirica' => random_int(1,26),
            'id_genero' => random_int(1,74),
            'nombre' => str_random(5),
            'descripcion' => 'somos una banda',
            'imagen' => 'uploads/bandas/default.jpg',

        ]);
    }

}
