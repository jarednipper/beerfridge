<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'api_token',
    ];

    public function beerRequests()
    {
        return $this->hasMany(BeerRequest::class);
    }

    public function beerRequestVotes()
    {
        return $this->hasMany(BeerRequestVote::class);
    }
}
