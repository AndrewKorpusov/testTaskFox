<?php


namespace App\Entity;


abstract class AbstractTransport implements TransportInterface
{
    protected $transportNumber;

    protected $departure;

    protected $arrival;

    protected $seat;

    protected $automaticallyProvideBaggage;

    public function getTransportNumber()
    {
        return $this->transportNumber;
    }

    public function setTransportNumber($transportNumber)
    {
        $this->transportNumber = $transportNumber;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    public function getArrival()
    {
        return $this->arrival;
    }

    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    }

    public function hasSeat()
    {
        return isset($this->seat);
    }

    public function getSeat()
    {
        return $this->seat;
    }

    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function isAutomaticallyProvideBaggage()
    {
        return $this->automaticallyProvideBaggage;
    }

    /**
     * @param mixed $automaticallyProvideBaggage
     */
    public function setAutomaticallyProvideBaggage($automaticallyProvideBaggage): self
    {
        $this->automaticallyProvideBaggage = $automaticallyProvideBaggage;

        return $this;
    }


}