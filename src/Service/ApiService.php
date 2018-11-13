<?php
/**
 * Created by PhpStorm.
 * User: wojry
 * Date: 13.11.2018
 * Time: 20:33
 */

namespace App\Service;


final class ApiService
{
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function getKitten() {
        $apiRes = $this->httpClient->request('GET', 'https://aws.random.cat/meow');
        $body = $apiRes->getBody();
        return json_decode($body);
    }

    public function getSomeKittens(int $amount = 10): array {
        $kittens = [];
        for ($i = 0; $i <= $amount; $i++) {
            $kitten = $this->getKitten();
            $kittens[$i] = $kitten->file;
        }

        return $kittens;
    }
}