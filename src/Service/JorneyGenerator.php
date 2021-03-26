<?php
namespace App\Service;

use App\Entity\AbstractTransport;
use App\Entity\TransportInterface;
use App\Factory\TransportFactory;

class JorneyGenerator
{
    /**
     * @param $transportCards
     */
    public function generateJorney($transportCards)
    {
        $transports = [];

        foreach ($transportCards as $transportCard) {
            $transports[] = TransportFactory::createFromTransportCard($transportCard);
        }

        return $this->sortTransportsByArrivalAndDeparture($transports);
    }

    private function sortTransportsByArrivalAndDeparture($transports)
    {

        foreach ($transports as $i => &$transport1) {
            $savedj = null;
            $transport2saved = null;
            foreach ($transports as $j => &$transport2) {
                if ($j <= $i) {
                    continue;
                }
                if ($transport1->getArrival() == $transport2->getDeparture()) {
                    if ($savedj) {
                        $transport2saved = $transports[$savedj];
                        $transports[$savedj] = $transport2;
                        $transports[$j] = $transport2saved;
                    }
                    $savedj = null;
                    break;
                } elseif ($transport1->getDeparture() == $transport2->getArrival()) {
                    if ($savedj) {
                        $transport1saved = $transports[$i];
                        $transport2saved = $transports[$savedj];
                        $transports[$i] = $transport2;
                        $transports[$savedj] = $transport1saved;
                        $transports[$j] = $transport2saved;
                    } else {
                        list($transport1, $transport2) = [$transport2, $transport1];
                    }
                    $savedj = null;
                    break;
                } elseif ($transport1->getDeparture() != $transport2->getArrival() || $transport1->getArrival() != $transport2->getDeparture()) {
                    if ($savedj === null) {
                        $savedj = $j;
                    }
                    continue;
                }
            }
        }

        return $transports;
    }
}