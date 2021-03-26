<?php


namespace App\Entity;


class Flight extends AbstractTransport
{
    private $isProvidedLuggageToNextLeg = true;

    private $gate;

    private $baggageTicket;

    public function isProvidedLuggageToNextLeg()
    {
        return $this->isProvidedLuggageToNextLeg;
    }

    /**
     * @return mixed
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @param mixed $gate
     * @return self
     */
    public function setGate($gate): self
    {
        $this->gate = $gate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBaggageTicket()
    {
        return $this->baggageTicket;
    }

    /**
     * @param mixed $baggageTicket
     * @return self
     */
    public function setBaggageTicket($baggageTicket): self
    {
        $this->baggageTicket = $baggageTicket;

        return $this;
    }

    private function getGateString()
    {
        return $this->gate ? sprintf('Gate %s,', $this->gate) : '';
    }

    private function getBaggageTicketString()
    {
        if (!$this->automaticallyProvideBaggage) {
            return $this->baggageTicket ? sprintf('Baggage drop at ticket counter %s,', $this->baggageTicket) : '';
        } elseif($this->isAutomaticallyProvideBaggage()) {
            return sprintf('Baggage will we automatically transferred from your last leg.');
        }
        return '';
    }

    private function getSeatString()
    {
        return $this->hasSeat() ? sprintf('Seat %s', $this->getSeat()) : 'No seat assignment';
    }

    public function __toString()
    {
        return sprintf("From %s, take flight %s to %s. %s %s. %s", $this->getDeparture(), $this->getTransportNumber(), $this->getArrival(),
            $this->getGateString(), $this->getSeatString(), $this->getBaggageTicketString());
    }

}