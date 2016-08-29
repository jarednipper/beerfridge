<?php

use App\Models\BeerRequest;
use Illuminate\Database\Seeder;

class BeerRequestVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user 1 has beerRequest 1 with 3 votes
        $beerRequest = BeerRequest::find(1);
        $beerRequest->votes()->createMany([
            [
                'user_id' => 1,
            ],
            [
                'user_id' => 2,
            ],
            [
                'user_id' => 3,
            ],
        ]);

        factory(App\Models\BeerRequestVote::class, 15)->create();
    }
}
