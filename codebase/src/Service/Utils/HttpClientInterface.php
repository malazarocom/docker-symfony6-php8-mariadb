<?php

namespace App\Service\Utils;

use App\Model\Exception\HttpRequestException;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param string $url
     * @return ResponseInterface
     * @throws HttpRequestException
     */
    public function request(string $method, string $url): ResponseInterface;
}
