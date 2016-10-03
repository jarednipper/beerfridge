<?php

namespace App\Api\V1\Services;

use App\Models\BeerRequest;
use App\Models\User;
use Carbon\Carbon;

class BeerRequestService
{

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showIndexRequests(User $user)
    {
        $requests = BeerRequest::with('votes', 'votes.user')
            ->whereNull('fulfilled_at')
            ->get()
            ->sortByDesc(function ($beerRequest) {
                return $beerRequest->votes->count();
            })
            ->values();

        foreach ($requests as $request) {
            $request->user_has_voted = $request->votes->where('user_id', $user->id)->count() > 0;
        }

        return $requests;
    }

    /**
     * @param BeerRequest $beerRequest
     * @return BeerRequest
     */
    public function fulfillRequest(BeerRequest $beerRequest)
    {
        if (!$beerRequest->fulfilled_at) {
            $beerRequest->fulfilled_at = Carbon::now();
            $beerRequest->saveOrFail();
        }

        return $beerRequest;
    }

    /**
     * @param BeerRequest $beerRequest
     * @param User $user
     * @return boolean
     */
    public function vote(BeerRequest $beerRequest, User $user)
    {
        if ($beerRequest->votes->where('user_id', $user->id)->count()) {
            return false;
        }

        $beerRequest->votes()->create([
            'user_id' => $user->id,
        ]);


        return true;
    }
}
