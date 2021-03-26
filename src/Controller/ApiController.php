<?php


namespace App\Controller;


use App\Service\JorneyGenerator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    private $jorneyGenerator;

    public function __construct(JorneyGenerator $jorneyGenerator)
    {
        $this->jorneyGenerator = $jorneyGenerator;
    }

    /**
     * @Route("/build-route", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function buildRoute(Request $request)
    {
        $data = $request->toArray();

        if (!is_array($data)) {
            throw new BadRequestHttpException('Data should be an array');
        }

        $result = $this->jorneyGenerator->generateJorney($data);

        return new JsonResponse($result);
    }
}