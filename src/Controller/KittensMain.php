<?php

namespace App\Controller;

use App\Service\ApiService;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\{Response, JsonResponse};
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;


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
     * @Route(
     *     "/kittens/{amount}",
     *     defaults={"amount"=10},
     *     name="main_route"
     *     )
     * @return Response
     */
    public function getKittens(int $amount) {
        // Check if parameter is bigger or equal to one, if not throw Exception
        if($amount >= 1) {
            $kittens = $this->ApiService->getSomeKittens($amount);

            return new JsonResponse($kittens);
        } else {
            throw new BadRequestHttpException("Given parameter was not correct. Suplay an int that is bigger then 0");
        }

    }
}