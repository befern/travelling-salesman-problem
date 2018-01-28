<?php


namespace Salesman;

class Cities
{
    /** @var City[] */
    private $cities;

    public function __construct(array $cities)
    {
        $this->cities = $cities;
    }

    /** @return City[] */
    public function getCities(): array
    {
        return $this->cities;
    }

    public function getCityNames(): array
    {
        return array_map(function (City $city) {
            return $city->getName();
        }, $this->getCities());
    }

    public function getTotalCities(): int
    {
        return count($this->getCities());
    }
}