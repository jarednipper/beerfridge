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

    public function index(Request $request)
    {
        return $this->beerRequestService->showIndexRequests($request->user());
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
        if (!$this->beerRequestService->vote($beerRequest, $request->user())) {
            return response()->json('', 400);
        }
        return response()->json('', 204);
    }

    public function fulfill(Request $request, BeerRequest $beerRequest)
    {

        return $this->beerRequestService->fulfillRequest($beerRequest);
    }
}