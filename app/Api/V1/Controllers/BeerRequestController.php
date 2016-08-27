<?php

namespace App\Api\V1\Controllers;

use App\Models\BeerRequest;

class BeerRequestController
{
    public function __construct()
    {
    }

    public function index()
    {
        return BeerRequest::all();
    }
}