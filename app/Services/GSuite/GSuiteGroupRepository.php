<?php

namespace App\Services\GSuite;

class GSuiteGroupRepository
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
     * Get GSuite group(s)
     * @return Collection
     */
    public function fetch()
    {
        return collect($this->directory_client->groups->listGroups(['domain' => config('gsuite.domain')])->groups);
    }

    /**
     * Create a new GSuite group
     */
    public function create(array $attributes)
    {
        $group = new \Google_Service_Directory_Group([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'description' => $attributes['description'],
        ]);

        return $this->directory_client->groups->insert($group);
    }

    /**
     * Delete a GSuite group
     */
    public function delete($email)
    {
        return $this->directory_client->groups->delete($email);
    }

    /**
     *
     */
    public function members($email)
    {
        return $this->directory_client->groups->get($email);
    }
}
