<?php

namespace App\Models;

use Eloquent;
use Watson\Validating\ValidatingTrait;

class BaseModel extends Eloquent
{
    use ValidatingTrait;

    protected $rules = [
//        'beer_request_id' => 'unique:beer_requests,id,NULL,'
    ];

}
