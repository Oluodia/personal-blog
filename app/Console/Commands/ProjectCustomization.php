<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectCustomization extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:project-customization';

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
        $commands = [
            'npm install',
            'php artisan key:generate',
            'npm run build',
            'php artisan migrate'
        ];

        foreach ($commands as $command) {
            $this->info("Running {$command}...");
            exec($command, $output, $returnVar);
            $this->info('Finished');
        }

        $this->info('All commands finished');
    }
}
