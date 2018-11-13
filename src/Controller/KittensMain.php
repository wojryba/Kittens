<?php
/**
 * Created by PhpStorm.
 * User: wojry
 * Date: 13.11.2018
 * Time: 19:57
 */

namespace App\Controller;

use App\Service\ApiService;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class KittensMain extends FOSRestController
{
    /**
     * @var ApiService
     */
    private $ApiService;

    /**
     * KittensMainController constructor.
     * @param ApiService $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->ApiService = $apiService;
    }

    /**
     * @Route("/{amount}",  defaults={"amount"=10}, methods={"GET"})
     * @return Response
     */
    public function Test($amount) {
        if(is_int($amount) && $amount >= 1) {
            $kittens = $this->ApiService->getSomeKittens();

            return new JsonResponse($kittens);
        }

    }

}