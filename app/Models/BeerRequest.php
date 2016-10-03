<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeerRequest extends BaseModel
{
    protected $table = 'beer_requests';

    protected $fillable = [
        'brewery_name',
        'brewery_location',
        'beer_name',
        'beer_style',
        'beer_ibu',
        'beer_abv',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'fulfilled_at',
    ];

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'beer_name' => 'required|string',
        'beer_style' => 'string',
        'beer_ibu' => 'integer',
        'beer_abv' => 'numeric',
    ];

    protected $with = [
        'user',
        'votes',
    ];

    protected $appends = [
        'user_has_voted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(BeerRequestVote::class);
    }

    public function getUserHasVotedAttribute()
    {
        if (array_key_exists('user_has_voted', $this->attributes)) {
            return $this->attributes['user_has_voted'];
        };
        return null;
    }
}
