<?php

use App\Api\V1\Services\BeerRequestService;

class BeerRequestServiceTest extends TestCase
{
    private $beerRequestService;

    public function setUp()
    {
        $this->beerRequestService = new BeerRequestService();

        parent::setUp();
    }

    public function testShowIndexRequests()
    {
        $requests = $this->beerRequestService->showIndexRequests();

        $this->assertEquals(3, $requests->count(), 'BeerRequestService->showAllRequests() should return 3 requests.');
    }

    public function testFulfill()
    {
        $beerRequest = factory(App\Models\BeerRequest::class)->create();

        self::assertNull($beerRequest->fulfilled_at, 'A new beer request should have a null filled_at date.');

        $beerRequest = $this->beerRequestService->fulfillRequest($beerRequest);

        self::assertNotNull($beerRequest->fulfilled_at, 'Fulfilling the beer request should set the filled_at date.');

        $beerRequest->delete();
    }

    public function testVote()
    {
        $user = factory(App\Models\User::class)->create();
        $beerRequest = $user->beerRequests()->save(factory(App\Models\BeerRequest::class)->make());

        self::assertEmpty($beerRequest->votes, 'A new beer request has no votes.');

        $beerRequest = $this->beerRequestService->vote($beerRequest, $user);

        self::assertCount(1, $beerRequest->votes, 'Beer request should now have one vote.');

        $user->delete();
    }
}
