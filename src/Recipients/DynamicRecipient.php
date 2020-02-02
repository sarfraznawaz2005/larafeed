<?php

namespace Sarfraznawaz2005\LaraFeed\Recipients;

class DynamicRecipient extends Recipient
{
    public function __construct($email)
    {
        $this->email = $email;
    }
}
