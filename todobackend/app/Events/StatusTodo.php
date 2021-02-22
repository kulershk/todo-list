<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusTodo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;

    public $done;

    /**
     * StatusTodo constructor.
     * @param $todoId
     * @param $todoStatus
     */
    public function __construct(
        $todoId,
        $todoStatus
    ) {
        $this->id = $todoId;
        $this->done = $todoStatus;
    }

    /**
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel("my-channel");
    }

    /**
     * @return string
     */
    public static function broadcastAs()
    {
        return 'statusTodo';
    }
}
