<?php

namespace App\Controller;

use App\Request\GetKittensRequest;
use App\Service\ApiService;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\{Response, JsonResponse};
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;


class KittenController extends FOSRestController
{
    /**
     * @var ApiService
     */
    private $ApiService;

    /**
     * KittenController constructor.
     * @param ApiService $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->ApiService = $apiService;
    }

    /**
     * @Route("/kittens", name="getKittens", methods={"POST"})
     * @param GetKittensRequest $request
     * @return JsonResponse
     */
    public function getKittens(GetKittensRequest $request) {
        $kittens = $this->ApiService->getSomeKittens($request->getAmount());
        return new JsonResponse($kittens);
    }
}