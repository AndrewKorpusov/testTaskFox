<?php
namespace App\Service;

use App\Entity\AbstractTransport;
use App\Entity\TransportInterface;
use App\Factory\TransportFactory;

class JorneyGenerator
{
    private $start;

    private $end;

    /**
     * @param $transportCards AbstractTransport[]
     */
    public function generateJorney($transportCards)
    {
        $transports = [];

        foreach ($transportCards as $transportCard) {
            $transports[] = TransportFactory::createFromTransportCard($transportCard);
        }


        return [];
    }

    private function sortByTransports($transports)
    {

    }

    /**
     * @param $transports TransportInterface[]
     * @param int $iterator
     */
    private function hasStartAndEnd($transports)
    {
        $arrivals = [];
        $departurers = [];
        foreach ($transports as $transport) {
            $arrivals[] = $transport->getArrival();
            $departurers[] = $transport->getDeparture();
        }

        $arrival = array_diff($arrivals, $departurers);
        $departure = array_diff($departurers, $arrivals);

        if (count($arrival) == 1 && count($departure) == 1) {

        }

        return [$departure, $arrival];
    }
}