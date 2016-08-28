<?php

use App\Models\BeerRequest;
use App\Models\BeerRequestVote;
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
    }
}
