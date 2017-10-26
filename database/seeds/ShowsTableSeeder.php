<?php

use Illuminate\Database\Seeder;

class ShowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Show::Class)
        	->times(100)
        	->create();
    }
}
