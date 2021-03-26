<?php


namespace App\Service;


use App\Entity\TransportInterface;

class TripListGenerator
{
    /**
     * @param $transports TransportInterface[]
     * @return array
     */
    public function getTripList($transports)
    {
        $result = [];
        foreach ($transports as $k => $transport) {
            $result[] = (string) $transport;
        }

        return $result;
    }
}