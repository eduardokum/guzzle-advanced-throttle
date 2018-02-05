<?php

namespace hamburgscleanest\GuzzleAdvancedThrottle\Cache\Interfaces;

use DateTime;
use hamburgscleanest\GuzzleAdvancedThrottle\RequestInfo;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface StorageInterface
 * @package hamburgscleanest\GuzzleAdvancedThrottle\Cache\Interfaces
 */
interface StorageInterface
{

    /**
     * @param string $host
     * @param string $key
     * @param int $requestCount
     * @param DateTime $expiresAt
     * @param int $remainingSeconds
     */
    public function save(string $host, string $key, int $requestCount, DateTime $expiresAt, int $remainingSeconds) : void;

    /**
     * @param string $host
     * @param string $key
     * @return RequestInfo|null
     */
    public function get(string $host, string $key) : ? RequestInfo;

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param int $duration
     */
    public function saveResponse(RequestInterface $request, ResponseInterface $response, int $duration = 300) : void;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface|null
     */
    public function getResponse(RequestInterface $request) : ? ResponseInterface;
}