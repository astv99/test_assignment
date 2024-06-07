<?php
namespace src\ProviderManager;

use DateTime;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use src\Integration\ServiceDataProvider;

class DataProviderManager extends ServiceDataProvider
{
    private CacheItemPoolInterface $cache;
    private LoggerInterface $logger;

    /**
    * @param string $serviceUrl
    * @param string $username
    * @param string $password
    * @param CacheItemPoolInterface $cache
    */
    public function __construct(string $serviceUrl, string $username, string $password, CacheItemPoolInterface $cache)
    {
        parent::__construct($serviceUrl, $username, $password);
        $this->cache = $cache;
    }

    /**
    * {@inheritdoc}
    */
    public function getData(array $input): array
    {
        $cacheKey = $this->getCacheKey($input);
        $cacheItem = $this->cache->getItem($cacheKey);
        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        try {
            $result = parent::get($input);
        } catch (Exception $e) {
            $this->logger->critical('Error getting data from the external service.');
            return [];
        }

        $cacheItem
            ->set($result)
            ->expiresAt((new DateTime())->modify('+1 hour'));
        // $cacheItem appears to be an unused variable? not sure why this line is needed here...

        return $result;
    }

    /**
    * @param array $input
    * @return string
    */
    public function getCacheKey(array $input): string
    {
        return 'cache-key-'.json_encode($input);
    }

    /**
    * @param LoggerInterface $logger
    * @return void
    */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
        return;
    }
}