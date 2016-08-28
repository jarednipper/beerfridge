<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Services\BeerRequestService;
use App\Models\BeerRequest;
use Illuminate\Http\Request;

class BeerRequestController
{
    private $beerRequestService;

    public function __construct(BeerRequestService $beerRequestService)
    {
        $this->beerRequestService = $beerRequestService;
    }

    public function index()
    {
        return $this->beerRequestService->showIndexRequests();
    }

    public function store(Request $request)
    {
        $beerRequest = new BeerRequest($request->all());
        $beerRequest->user_id = $request->user()->id;

        if (!$beerRequest->save()) {
            return response()->json(['errors'=>$beerRequest->getErrors()], 400);
        }

        return $beerRequest;
    }

    public function destroy(Request $request, BeerRequest $beerRequest)
    {
        return $beerRequest->delete();
    }


    public function vote(Request $request, BeerRequest $beerRequest)
    {
        return $this->beerRequestService->vote($beerRequest, $request->user());
    }

    public function fulfill(Request $request, BeerRequest $beerRequest)
    {

        return $this->beerRequestService->fulfillRequest($beerRequest);
    }
}