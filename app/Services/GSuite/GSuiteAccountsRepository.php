<?php

namespace App\Services\GSuite;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class GSuiteAccountsRepository
{
    /**
     * Google Directory Client
     */
    protected $directory_client;

    public function __construct(GSuite $gsuite)
    {
        $this->directory_client = $gsuite->directory_client;

        return $this;
    }

    /**
     * Get a GSuite account
     * @param $email
     * @return \Google_Service_Directory_User
     */
    public function get($email)
    {
        return $this->directory_client->users->get($email, ['projection' => 'full']);
    }

    /**
     * Get GSuite accounts
     * @return |Collection
     */
    public function fetch()
    {
        if (Cache::has('gsuite:accounts')) {
            $accounts = Cache::get('gsuite:accounts', collect());
        } else {
            $accounts = collect($this->directory_client->users->listUsers(['domain' => config('gsuite.domain')])->users);

            Cache::put('gsuite:accounts', $accounts, now()->addMinutes(30));
        }
        return $accounts;
    }

    /**
     * Get all GSuite accounts
     * @return Collection
     * @alias fetch()
     */
    public function fetchAll()
    {
        return $this->fetch();
    }

    /**
     * Create a new GSuite account
     */
    public function create()
    {
        Cache::forget('gsuite:accounts');
    }

    /**
     * Delete a GSuite account
     */
    public function delete()
    {
        //
    }

    /**
     * Suspend a GSuite account
     */
    public function suspend()
    {
        //
    }
}
