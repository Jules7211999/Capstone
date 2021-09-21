<?php

namespace App\Listeners;

use App\Events\SOSevent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SOSlistener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SOSevent  $event
     * @return void
     */
    public function handle(SOSevent $event)
    {
        //
    }
}
