<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user} {--id=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a marketing email to a user';

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
        // $users = $this->argument('user');
        // $users = $this->arguments();
        $users = $this->options();
        var_dump($users);die();
        if (!$users) {
            $this->line('ok');
        } else {
            foreach ($users as $user) {
                $this->line('user is ' . $user);
            }
        }

        // $this->line('ok');
    }
}
