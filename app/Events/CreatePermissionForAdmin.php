<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatePermissionForAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
