<?php

use App\Api\V1\Services\BeerRequestService;

class BeerRequestServiceTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndex()
    {
        $beerRequestService = new BeerRequestService();
        $requests = $beerRequestService->showAllRequests();

        $this->assertEquals(2, $requests->count(), 'BeerRequestService->showAllRequests() should return 3 requests.');
    }
}
