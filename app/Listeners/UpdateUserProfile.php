<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Contracts\UserRepoInterface;

class UpdateUserProfile
{
    protected $userRepo;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepoInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $this->userRepo->setUserProfileToDefault($event->user->id);
    }
}
