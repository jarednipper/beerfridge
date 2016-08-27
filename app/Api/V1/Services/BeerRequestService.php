<?php

namespace App\Api\V1\Services;

use App\Models\BeerRequest;

class BeerRequestService
{
    public function showAllRequests()
    {
        return BeerRequest::all();
    }
}