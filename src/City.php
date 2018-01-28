<?php


namespace Salesman;


class City
{
    private $name;
    private $latitude;
    private $longitude;

    public function __construct(string $name, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function isEqual(City $city): bool
    {
        return $this->getName() == $city->getName();
    }
}
