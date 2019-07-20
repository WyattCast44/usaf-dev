<?php

namespace App\Console\Commands;

use App\Models\Passport\Token;
use Illuminate\Console\Command;

class PruneRevokedTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passport:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prune/delete old revoked access tokens.';

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
        Token::where('revoked', true)->delete();
    }
}
