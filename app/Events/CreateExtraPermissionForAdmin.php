<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateExtraPermissionForAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $extra_permissions;

    public function __construct(string|null $extra_permissions)
    {
        $this->extra_permissions = $extra_permissions;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
