<?php


namespace App\Controller;


use App\Service\JorneyGenerator;
use App\Service\TripListGenerator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    private $jorneyGenerator;

    private $tripListGenerator;

    public function __construct(JorneyGenerator $jorneyGenerator, TripListGenerator $tripListGenerator)
    {
        $this->jorneyGenerator = $jorneyGenerator;

        $this->tripListGenerator = $tripListGenerator;
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

        $transports = $this->jorneyGenerator->generateJorney($data);
        $result = $this->tripListGenerator->getTripList($transports);

        return new JsonResponse($result);
    }
}