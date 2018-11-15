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
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
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
     * @Route(
     *     "/get-some-kittens-honey/{amount}",
     *     defaults={"amount"=10},
     *     name="main_route"
     *     )
     * @return Response
     */
    public function getKittens($amount) {
        // Check if parameter is an integer, if not throw Exception
        if(!$this->isInteger($amount)) {
            throw new BadRequestHttpException("Given parameter was not correct. Suplay an int that is bigger then 0");
            return;
        }

        $amount = (int)$amount;

        // Check if parameter is bigger or equal to one, if not throw Exception
        if($amount >= 1) {
            $kittens = $this->ApiService->getSomeKittens($amount);

            return new JsonResponse($kittens);
        } else {
            throw new BadRequestHttpException("Given parameter was not correct. Suplay an int that is bigger then 0");
        }

    }

    // function that check if given string is integer
    private function isInteger($input): bool{
        return(ctype_digit(strval($input)));
    }
}