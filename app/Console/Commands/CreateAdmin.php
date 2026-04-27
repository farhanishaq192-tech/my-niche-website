<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create
        {--email=admin@neuralcraft.pk : Admin email}
        {--password=admin1234 : Admin password}
        {--name=NeuralCraft Admin : Admin name}';

    protected $description = 'Create or refresh the Filament admin user';

    public function handle(): int
    {
        $email    = $this->option('email');
        $password = $this->option('password');
        $name     = $this->option('name');

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name'     => $name,
                'password' => Hash::make($password),
            ]
        );

        $this->info("Admin ready: {$user->email} (id {$user->id})");
        return self::SUCCESS;
    }
}
