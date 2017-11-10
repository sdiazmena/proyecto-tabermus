<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('CiudadTableSeeder');
        $this->call('RegionTableSeeder');
        $this->call('LiricaTableSeeder');
        $this->call('GeneroTableSeeder');
         //$this->call('ShowsTableSeeder');
         $this->call('UsersTableSeeder');


    }
}
