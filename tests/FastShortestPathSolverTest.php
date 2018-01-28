<?php

namespace Test\Salesman;

use PHPUnit\Framework\TestCase;
use Salesman\FastShortestPathSolver;

class FastShortestPathSolverTest extends TestCase
{
    /** @var FastShortestPathSolver */
    private $solve;

    protected function setUp()
    {
        parent::setUp();
        $this->solve = new FastShortestPathSolver(new InMemoryCitiesRepository());
    }

    public function testResolveSimplePath()
    {
        $this->assertEquals([
            'Beijing',
            'Vladivostok',
            'Tokyo',
            'Bangkok',
            'Singapore',
            'Perth',
            'Melbourne',
            'Auckland',
            'San Francisco',
            'Vancouver',
            'Anchorage',
            'Toronto',
            'New York',
            'Caracas',
            'San Jose',
            'Mexico City',
            'Lima',
            'Rio',
            'Santiago',
            'Dakar',
            'Accra',
            'Casablanca',
            'Paris',
            'London',
            'Prague',
            'Moscow',
            'Astana',
            'New Delhi',
            'Jerusalem',
            'Cairo',
            'Lusaka',
            'Reykjavík'
        ], $this->solve->resolve());
    }
}