<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TextTodo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $text;

    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        $todoId,
        $todoText
    ) {
        $this->id = $todoId;
        $this->text = $todoText;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("my-channel");
    }

    public static function broadcastAs()
    {
        return 'textTodo';
    }
}
