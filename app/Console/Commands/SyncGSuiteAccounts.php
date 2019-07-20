<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Admin\GSuiteAccountsController;
use App\Services\GSuite\GSuiteAccountsRepository;
use App\Models\GSuite\GSuiteAccount;

class SyncGSuiteAccounts extends Command
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
    protected $description = 'Sync GSuite accounts';

    /**
     * The GSuite Accounts Repo
     */
    protected $accounts;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GSuiteAccountsRepository $accounts_repo)
    {
        parent::__construct();

        $this->accounts = $accounts_repo->fetch();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // The stored accounts
        $syncedAccounts = GSuiteAccount::all()->pluck('email');
        
        // The accounts pulled from google
        $googleAccounts = $this->accounts->pluck('primaryEmail');

        $unsyncedAccounts = $googleAccounts->filter(function ($googleAccount) use ($syncedAccounts) {
            return !$syncedAccounts->contains($googleAccount);
        });

        // Create the accounts
        $unsyncedAccounts->each(function ($account) {
            GSuiteAccount::create([
                'email' => $account
            ]);
        });
    }
}
