<?php


namespace App\Entity;


class Train extends AbstractTransport
{
    private $isProvidedLuggageToNextLeg = false;

    public function isProvidedLuggageToNextLeg()
    {
        return $this->isProvidedLuggageToNextLeg;
    }

    public function validate()
    {
        if (!$this->getArrival()) {
            return false;
        }
        if (!$this->getDeparture()) {
            return false;
        }
        if (!$this->getTransportNumber()) {
            return false;
        }

        return true;
    }

    private function getSeatString()
    {
        return $this->hasSeat() ? sprintf('Sit in seat %s', $this->getSeat()) : 'No seat assignment';
    }

    public function __toString()
    {
        return sprintf("Take train %s from %s to %s. %s", $this->getTransportNumber(), $this->getDeparture(), $this->getArrival(), $this->getSeatString());
    }
}