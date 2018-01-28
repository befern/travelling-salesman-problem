<?php

namespace Salesman;

class FastShortestPathSolver
{
    private $citiesRepository;

    public function __construct(CitiesRepository $citiesRepository)
    {
        $this->citiesRepository = $citiesRepository;
    }

    public function resolve(): string
    {
        $cities = $this->citiesRepository->cities();
        $path = $this->findShortestPathByClosestNextPoint($cities);

        return implode(",", $path);
    }

    private function findShortestPathByClosestNextPoint(Cities $cities): array
    {
        $sortedDistances = $this->allDistancesSorted($cities);
        $path = [];
        $path[0] = "Beijing";
        $currentCity = $path[0];

        for($i=1; $i<count($cities->getCities()); $i++)
        {
            $path[$i] = $this->getClosestCityNotVisited($currentCity, $path, $sortedDistances);
            $currentCity = $path[$i];
        }

        return $path;
    }

    private function getClosestCityNotVisited(string $currentCity, array $visitedCitiesNames, array $sortedDistances): string
    {
        $resultCity = "";
        foreach($sortedDistances[$currentCity] as $cityTo => $distance)
       {
           if (!in_array($cityTo, $visitedCitiesNames)) {
               $resultCity = $cityTo;
               break;
           }
       }

       return $resultCity;
    }

    private function allDistancesSorted(Cities $cities): array
    {
        $distances = [];

        foreach($cities->getCities() as $cityFrom)
        {
            foreach ($cities->getCities() as $cityTo)
            {
                if (!$cityFrom->isEqual($cityTo))
                {
                    $distance = $this->mileDistance($cityFrom, $cityTo);
                    $distances[$cityFrom->getName()][$cityTo->getName()] = $distance;
                }
            }
            asort($distances[$cityFrom->getName()]);
        }

        return $distances;
    }

    private function mileDistance(City $cityFrom, City $cityTo): int
    {
        $earthRadius = 6371000;

        $latFrom = deg2rad($cityFrom->getLatitude());
        $lonFrom = deg2rad($cityFrom->getLongitude());
        $latTo = deg2rad($cityTo->getLatitude());
        $lonTo = deg2rad($cityTo->getLongitude());

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius;
        
    }
}
