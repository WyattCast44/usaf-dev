<?php

namespace App\Services\GSuite;

use Illuminate\Support\Facades\Cache;

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
     * Get GSuite group
     * @return \Google_Service_Directory_Group
     */
    public function get($email)
    {
        if (Cache::has('gsuite:groups')) {
            $group = Cache::get('gsuite:groups')->firstWhere('email', $email);
        } else {
            $groups = collect($this->directory_client->groups->listGroups(['domain' => config('gsuite.domain')])->groups);
            Cache::add('gsuite:groups', $groups, now()->addMinutes(30));
            $group = $groups->firstWhere('email', $email);
        }

        return $group;
    }

    /**
     * Get GSuite groups
     * @return Collection of \Google_Service_Directory_Group
     */
    public function fetch()
    {
        if (Cache::has('gsuite:groups')) {
            $groups = Cache::get('gsuite:groups');
        } else {
            $groups = collect($this->directory_client->groups->listGroups(['domain' => config('gsuite.domain')])->groups);
            Cache::add('gsuite:groups', $groups, now()->addMinutes(30));
        }

        return $groups;
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

        Cache::forget('gsuite:groups');

        return $this->directory_client->groups->insert($group);
    }

    /**
     * Delete a GSuite group
     */
    public function delete($email)
    {
        Cache::forget('gsuite:groups');
        
        return $this->directory_client->groups->delete($email);
    }
}
