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

    /**
     * @return City[]
     */
    public function getCities(): array
    {
        return $this->cities;
    }
}