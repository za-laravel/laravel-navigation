<?php

namespace ZaLaravel\LaravelNavigation\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;


/**
 * Class NavigationWasEdited
 * @package ZaLaravel\LaravelNavigation\Events
 */
class NavigationWasEdited extends Event
{

    use SerializesModels;

    protected $nav;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nav)
    {
        $this->nav = $nav;
    }

    public function getNavigation()
    {
        return $this->nav;
    }
}
