<?php


namespace Test\Salesman;


use Salesman\Cities;
use Salesman\CitiesRepository;
use Salesman\City;

class InMemoryCitiesRepository implements CitiesRepository
{
    public function cities(): Cities
    {
        return new Cities(
           [
               new City("Beijing", 39.9, 116.40),
               new City("Tokyo", 35.40, 139.45),
               new City("Vladivostok", 43.8, 131.54),
               new City("Dakar", 14.40, -17.28),
               new City("Singapore", 1.14, 103.55),
               new City("San Francisco", 37.47, -122.26),
               new City("Auckland", -36.52, 174.45),
               new City("London", 51.32, -0.5),
               new City("Reykjavík", 64.4, -21.58),
               new City("Paris", 48.86, 2.34),
               new City("Prague", 50.5, 14.26),
               new City("New York", 40.47, -73.58),
               new City("New Delhi", 28.60, 77.22),
               new City("Rio", -22.57, -43.12),
               new City("Mexico City", 19.26,  -99.7),
               new City("Lima",  -12     , -77.2    ),
               new City("Moscow",  55.45   , 37.36    ),
               new City("Cairo",  30.2    , 31.21    ),
               new City("Toronto",  43.40   , -79.24   ),
               new City("Santiago",  -12.56  , -38.27   ),
               new City("Caracas",  10.28   , -67.2    ),
               new City("San Jose",  9.55    , -84.02   ),
               new City("Lusaka",  -15.25  , 28.16    ),
               new City("Casablanca",  33.35   , -7.39    ),
               new City("Astana",  51.10   , 71.30    ),
               new City("Bangkok",  13.45   , 100.30   ),
               new City("Perth",  -31.57  , 115.52   ),
               new City("Melbourne",  -37.47  , 144.58   ),
               new City("Vancouver",  49.16   , -123.07  ),
               new City("Anchorage",  61.17   , -150.02  ),
               new City("Accra",  5.35    , -0.06     ),
               new City("Jerusalem",  31.78   , 35.22    ),
           ]
        );
    }
}
