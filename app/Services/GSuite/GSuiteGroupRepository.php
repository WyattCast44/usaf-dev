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
        return $this->directory_client->groups->listGroups(['domain' => config('gsuite.domain')])->groups;
    }

    /**
     * Create a new GSuite group
     */
    public function create($email, $description, $name)
    {
        $group = new \Google_Service_Directory_Group([
            'email' => $email,
            'description' => $description,
            'name' => $name
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
}
