<?php

namespace App\Service;

final class ApiService
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function getKitten(): \stdClass  {
        $apiRes = $this->httpClient->request('GET', 'https://aws.random.cat/meow');
        $body = $apiRes->getBody();
        return json_decode($body);
    }

    public function getSomeKittens(int $amount): array {
        --$amount;
        $kittens = [];
        for ($i = 0; $i <= $amount; $i++) {
            $kitten = $this->getKitten();
            $kittens[$i] = $kitten->file;
        }

        return $kittens;
    }
}