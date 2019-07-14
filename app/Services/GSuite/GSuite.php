<?php

namespace App\Services\GSuite;

class GSuite
{
    protected $config;

    public function __construct()
    {
        $this->config = $this->getConfig();

        return $this;
    }

    protected function getConfig()
    {
        return config('gsuite');
    }
}
