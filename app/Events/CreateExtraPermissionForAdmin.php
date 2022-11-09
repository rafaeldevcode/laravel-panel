<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateExtraPermissionForAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string $extra_permissions
     */
    public $extra_permissions;

    /**
     * Create a new event instance.
     *
     * @param string $extra_permissions
     * @return void
     */
    public function __construct(string $extra_permissions)
    {
        $this->extra_permissions = $extra_permissions;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
