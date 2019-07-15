<?php

namespace App\Services\GSuite;

use Illuminate\Support\Collection;

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
     * Get GSuite account(s)
     * @param $email
     * @return \Google_Service_Directory_User|Collection
     */
    public function fetch($email = null)
    {
        if ($email <> null) {
            return $this->directory_client->users->get($email, ['projection' => 'full']);
        }

        return collect($this->directory_client->users->listUsers(['domain' => config('gsuite.domain')])->users);
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
        //
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
