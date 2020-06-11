<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\UsersController;
class AddUserComment extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:addcomment {id} {comments*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will add comment to users table based on the params.';

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
     * @return mixed
     */
    public function handle()
    {
      
        $userId = $this->argument('id');
        $comments = $this->argument('comments');

        $command  = new UsersController;
        $command->commandController($userId,$comments);
    }
}
