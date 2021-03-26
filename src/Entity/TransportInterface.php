<?php
namespace App\Entity;

interface TransportInterface
{
    public function getTransportNumber();

    public function setTransportNumber($transportNumber);

    public function getDeparture();

    public function setDeparture($departure);

    public function getArrival();

    public function setArrival($arrival);

    public function hasSeat();

    public function getSeat();

    public function setSeat($seat);

    public function isProvidedLuggageToNextLeg();

}