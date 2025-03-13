<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateOwnerAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-owner-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('Введите email: ');
        $name = $this->ask('Введите имя аккаунта: ');
        $login = $this->ask('Введите login: ');
        $password = $this->ask('Ведите пароль: ');

        User::create([
            'name' => $name,
            'login' => $login,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Аккаунт создан!');
        return 0;
    }
}
