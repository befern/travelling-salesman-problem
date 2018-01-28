<?php

namespace Test\Salesman;

use Salesman\Cities;
use Salesman\CitiesRepository;
use Salesman\City;

class InMemoryCitiesRepositoryWithoutBeijing implements CitiesRepository
{
    public function cities(): Cities
    {
        return new Cities(
            [
                new City("Tokyo", 35.40, 139.45),
                new City("Vladivostok", 43.8, 131.54),
                new City("Dakar", 14.40, -17.28),
            ]
        );
    }
}
