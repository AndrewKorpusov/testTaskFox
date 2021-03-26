<?php


namespace App\Entity;


class Bus extends AbstractTransport
{
    private $isProvidedLuggageToNextLeg = false;

    public function isProvidedLuggageToNextLeg()
    {
        return $this->isProvidedLuggageToNextLeg;
    }


}