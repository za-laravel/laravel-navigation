<?php

namespace ZaLaravel\LaravelNavigation\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class NavigationWasDeleted extends Event {

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

    public function getNavigation(){
        return $this->nav;
    }

}
