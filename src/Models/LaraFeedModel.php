<?php

namespace Sarfraznawaz2005\LaraFeed\Models;

use Illuminate\Database\Eloquent\Model;

class LaraFeedModel extends Model
{
    protected $table = 'larafeeds';

    protected $fillable = [
        'name',
        'email',
        'message',
        'ip',
        'uri',
    ];
}
