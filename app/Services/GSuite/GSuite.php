<?php

namespace App\Services\GSuite;

class GSuite
{
    /**
     * The config file
     */
    protected $config;

    /**
     * The Google API Client
     */
    public $google_client;

    /**
     * The Google Directory Client
     */
    public $directory_client;

    /**
     * Bootstrap the service
     * @return GSuite
     */
    public function __construct()
    {
        $this->setConfig()
            ->setGoogleClient()
            ->setDirectoryClient();

        return $this;
    }

    /**
     * Set the configuration file
     * @return GSuite
     */
    protected function setConfig()
    {
        $this->config = config('gsuite');

        return $this;
    }

    /**
     * Set the $google_client
     * @return GSuite
     */
    protected function setGoogleClient()
    {
        // Set the credentials in the env
        if (!getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $this->config['credentials_path']);
        }

        // Set and configure the client
        $this->google_client = new \Google_Client();
        $this->google_client->useApplicationDefaultCredentials();
        $this->google_client->setSubject($this->config['subject']);
        $this->google_client->setScopes($this->config['scopes']);

        return $this;
    }

    /**
     * Set the $directory_client
     * @return GSuite
     */
    protected function setDirectoryClient()
    {
        $this->directory_client = new \Google_Service_Directory($this->google_client);

        return $this;
    }
}
