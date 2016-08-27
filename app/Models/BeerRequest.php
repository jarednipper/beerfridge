<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeerRequest extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
