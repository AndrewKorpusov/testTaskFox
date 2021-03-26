<?php


namespace App\Entity;


class Flight extends AbstractTransport
{
    private $isProvidedLuggageToNextLeg = true;

    public function isProvidedLuggageToNextLeg()
    {
        return $this->isProvidedLuggageToNextLeg;
    }


}