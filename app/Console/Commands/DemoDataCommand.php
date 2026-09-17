<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:demo-data {--force : Skip the confirmation prompt}')]
#[Description('Wipe the database and reseed it with demo content and test accounts for every role')]
class DemoDataCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (! $this->option('force') && ! $this->confirm('This will DROP ALL TABLES and reseed demo data. Continue?')) {
            $this->info('Aborted.');

            return;
        }

        $this->call('migrate:fresh', ['--seed' => true]);

        $this->newLine();
        $this->info('Demo data ready. Test accounts (password: "password"):');
        $this->table(['Role', 'Email'], [
            ['admin', 'admin@sarab.test'],
            ['kitchen', 'kitchen@sarab.test'],
            ['rider', 'rider@sarab.test'],
            ['customer', 'customer@sarab.test'],
        ]);
    }
}
