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

            if (!array_key_first($transports) == $k && $transport->isProvidedLuggageToNextLeg()) {
                if ($transports[$k-1]->isProvidedLuggageToNextLeg()) {
                    $transport->setAutomaticallyProvideBaggage(true);
                }
            }
            $result[] = (string) $transport;
        }

        if (count($result) > 0) {
            $result[] = 'You have arrived at your final destination';
        }

        return $result;
    }
}