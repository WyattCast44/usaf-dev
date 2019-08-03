<?php

namespace App\Services\GSuite;

use Illuminate\Support\Facades\Cache;

class GSuiteGroupRepository
{
    /**
     * Google Directory Client
     */
    protected $directory_client;

    protected $cache_name;

    public function __construct(GSuite $gsuite)
    {
        $this->directory_client = $gsuite->directory_client;

        $this->cache_name = config('gsuite.groups-cache', 'gsuite:groups');

        return $this;
    }

    public function forceRefresh()
    {
        Cache::forget($this->cache_name);

        return $this;
    }

    /**
     * Get GSuite group
     * @return \Google_Service_Directory_Group
     */
    public function get($email)
    {
        if (Cache::has($this->cache_name)) {
            $group = Cache::get($this->cache_name)->firstWhere('email', $email);
        } else {
            $groups = collect($this->directory_client->groups->listGroups(['domain' => config('gsuite.domain')])->groups);
            Cache::add($this->cache_name, $groups, now()->addMinutes(30));
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
        if (Cache::has($this->cache_name)) {
            $groups = Cache::get($this->cache_name);
        } else {
            $groups = collect($this->directory_client->groups->listGroups(['domain' => config('gsuite.domain')])->groups);
            Cache::add($this->cache_name, $groups, now()->addMinutes(10));
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

        $group = $this->directory_client->groups->insert($group);

        $this->forceRefresh();

        return $group;
    }

    /**
     * Update a new GSuite group
     */
    public function update($email, array $attributes)
    {
        //
    }

    /**
     * Delete a GSuite group
     */
    public function delete($email)
    {
        Cache::forget($this->cache_name);
        
        return $this->directory_client->groups->delete($email);
    }
}
