<?php

use Illuminate\Database\Seeder;

class BeerRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BeerRequest::class, 3)->create();
    }
}
