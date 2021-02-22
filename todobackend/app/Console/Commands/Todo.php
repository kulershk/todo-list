<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Todo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todo:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all todos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Todo::truncate();
        $this->info("All todos deleted!");
    }
}
