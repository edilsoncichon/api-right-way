<?php

namespace App\Domains\User\Console;

use App\Domains\User\User;
use Illuminate\Console\Command;

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
    protected $description = 'Create an user.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data['name'] = $this->ask('Name');
        $data['email'] = $this->ask('Email');
        $data['password'] = $this->secret('Password');

        if ($data['name'] == null || $data['email'] == null || $data['password'] == null) {
            $this->error('No field can be empty!');
            return;
        }
        $data['password'] = bcrypt($data['password']);

        User::query()->create($data);
        $this->info('User created successfully!');
    }
}
