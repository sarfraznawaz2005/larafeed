<?php

namespace Sarfraznawaz2005\LaraFeed\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class FeedbackReceivedEvent
{
    use SerializesModels;

    /** @var Collection */
    protected $feedback;

    public function __construct(Collection $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * @return Collection
     */
    public function getFeedback(): Collection
    {
        return $this->feedback;
    }
}
