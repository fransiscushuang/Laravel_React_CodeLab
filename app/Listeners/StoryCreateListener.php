<?php

namespace App\Listeners;

use App\Actions\Story\StoryEmailNotifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoryCreateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    private $notification;

    public function __construct(StoryEmailNotifications $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->notification->execute($event->story);
    }
}
