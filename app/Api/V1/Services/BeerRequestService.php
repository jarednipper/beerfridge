<?php

namespace App\Api\V1\Services;

use App\Models\BeerRequest;
use App\Models\User;
use Carbon\Carbon;

class BeerRequestService
{
    public function showIndexRequests()
    {
        return BeerRequest::with('votes')
            ->whereNull('fulfilled_at')
            ->get()
            ->sortByDesc(function ($beerRequest) {
                return $beerRequest->votes->count();
            });
    }

    public function fulfillRequest(BeerRequest $beerRequest)
    {
        if (!$beerRequest->fulfilled_at) {
            $beerRequest->fulfilled_at = Carbon::now();
            $beerRequest->saveOrFail();
        }

        return $beerRequest;
    }

    public function vote(BeerRequest $beerRequest, User $user)
    {
        $beerRequest->votes()->create([
            'user_id' => $user->id,
        ]);

        return $beerRequest->fresh();
    }
}
