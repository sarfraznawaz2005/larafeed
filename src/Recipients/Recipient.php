<?php

namespace Sarfraznawaz2005\LaraFeed\Recipients;

use Illuminate\Notifications\Notifiable;

abstract class Recipient
{
    use Notifiable;

    protected $email;
}
