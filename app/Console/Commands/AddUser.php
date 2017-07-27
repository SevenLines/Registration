<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:adduser {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds new user';

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
        $email = $this->argument("email");
        $password = $this->argument("password");

        User::create([
            'name' => $email,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }
}
