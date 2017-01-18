<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;

use App\User;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a login user';

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
        $this->info("Now we're going to create a user.");
        $this->info("Please answer the following questions to continue.");

        $user_id = $this->ask("What is the user login id?");
        $user_name = $this->ask("What is the user name?");

        $email = $this->ask("What is the user email?");

        $password = $this->secret("What is the password?");
        $retype_pass = $this->secret("Please retype the password.");
        if( $password != $retype_pass ){
            $this->error("Password does not match!");
            return;
        }

        $is_admin = $this->confirm("Is this user has admin right?");

        $user = new User;

        $user->is_admin = $is_admin;
        $user->username = $user_id;
        $user->name = $user_name;
        $user->email = $email;
        $user->password = bcrypt($password);
        
        $user->save();

        $this->info('User created. ID: '.$user->id);
    }
}
