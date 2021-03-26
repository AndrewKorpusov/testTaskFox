<?php


namespace App\Entity;


class Train extends AbstractTransport
{
    private $isProvidedLuggageToNextLeg = false;

    public function isProvidedLuggageToNextLeg()
    {
        return $this->isProvidedLuggageToNextLeg;
    }

}