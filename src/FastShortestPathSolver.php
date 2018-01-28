<?php

namespace Salesman;

class FastShortestPathSolver
{
    private $citiesRepository;

    public function __construct(CitiesRepository $citiesRepository)
    {
        $this->citiesRepository = $citiesRepository;
    }

    /** @throws BeijingNotFoundException */
    public function resolve(): array
    {
        $cities = $this->citiesRepository->cities();

        $this->guardBeijingExists($cities);

        return $this->findShortestPathByClosestNextPoint($cities);
    }

    /** @throws BeijingNotFoundException */
    private function guardBeijingExists(Cities $cities)
    {
        if (!in_array("Beijing", $cities->getCityNames()))
            throw new BeijingNotFoundException;
    }

    private function findShortestPathByClosestNextPoint(Cities $cities): array
    {
        $sortedDistances = $this->allDistanceCitiesSorted($cities);
        $shortestPath = [];
        $shortestPath[0] = "Beijing";

        for ($i = 1; $i < $cities->getTotalCities(); $i++) {
            $shortestPath[$i] = $this->getClosestCityNotVisited($shortestPath[$i - 1], $shortestPath, $sortedDistances);
        }

        return $shortestPath;
    }

    private function getClosestCityNotVisited(string $currentCity, array $visitedCitiesNames, array $sortedDistances): string
    {
        $resultCity = "";
        foreach ($sortedDistances[$currentCity] as $cityTo => $distance) {
            if (!in_array($cityTo, $visitedCitiesNames)) {
                $resultCity = $cityTo;
                break;
            }
        }

        return $resultCity;
    }

    private function allDistanceCitiesSorted(Cities $cities): array
    {
        $distances = [];

        foreach ($cities->getCities() as $cityFrom) {
            foreach ($cities->getCities() as $cityTo) {
                if (!$cityFrom->isEqual($cityTo)) {
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
