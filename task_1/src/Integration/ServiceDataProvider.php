<?php
namespace src\Integration;

class ServiceDataProvider
{
    private $serviceUrl;
    private $username;
    private $password;

    /**
    * @param $serviceUrl
    * @param $username
    * @param $password
    */
    public function __construct(string $serviceUrl, string $username, string $password)
    {
        $this->serviceUrl = $serviceUrl;
        $this->username = $username;
        $this->password = $password;
    }

    /**
    * @param array $request
    * @return array
    */
    public function get(array $request): array
    {
        // returns a response from an external service
        if ($request) return $request;
        else return [];
        // temporary stub functionality; could be replaced with an actual URL request via curl
    }
}