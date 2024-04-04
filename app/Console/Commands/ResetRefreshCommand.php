<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetRefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets/Refresh the database(ie: dp wipe, migrate, seed)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //-- Wipe the database
        $this->call('db:wipe');

        //-- Migrate the database
        $this->call('migrate');

        //-- Seed the database
        $this->call('db:seed');

        //-- Clear Cache
        $this->call('optimize:clear');

        //-- Flush Session
         //-- Flush Session
         session()->flush();

        return Command::SUCCESS;
    }
}
