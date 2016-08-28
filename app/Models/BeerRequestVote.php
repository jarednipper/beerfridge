<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeerRequestVote extends BaseModel
{
    protected $table = 'beer_request_votes';

    protected $fillable = [
        'beer_request_id',
        'user_id',
    ];

    protected $rules = [
        'user_id' => 'required|exists:users,id|unique_with:beer_request_votes,beer_request_id',
        'beer_request_id' => 'required|exists:beer_requests,id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beerRequest()
    {
        return $this->belongsTo(BeerRequest::class);
    }
}
