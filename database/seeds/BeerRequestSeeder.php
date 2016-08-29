<?php

use App\Models\BeerRequest;
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
        // user 1 has beerRequest 1
        BeerRequest::create([
            'id' => 1,
            'user_id' => 1,
            'beer_name' => 'Dutch',
            'beer_style' => 'Belgian Quad',
            'brewery_name' => 'Woodland Empire',
            'brewery_location' => 'Boise, ID',
        ]);

        factory(App\Models\BeerRequest::class, 14)->create();
    }
}
