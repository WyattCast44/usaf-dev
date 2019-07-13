<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncGSuiteAccountsWithGoogle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gsuite:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync GSuite accounts with the GSuite API.';

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
        logger('Synced GSuite accounts.');
    }
}
