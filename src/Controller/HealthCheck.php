<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};

class HealthCheck extends FOSRestController
{
    public function __construct()
    {
    }

    /**
     * @Route("/test", name="helthCheckRoute", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function HealthCheck(Request $request, Response $response) {
        $content = $request->getContent();
        $response->addItems($content);
        return $this->successJsonResponse($response->getResponse(User::class));
    }
}