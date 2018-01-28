<?php

namespace Test\Salesman;

use PHPUnit\Framework\TestCase;
use Salesman\BeijingNotFoundException;
use Salesman\FastShortestPathSolver;

class FastShortestPathSolverTest extends TestCase
{
    public function test_resolve_full_path()
    {
        $solver = new FastShortestPathSolver(new InMemoryCitiesRepository());

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
        ], $solver->resolve());
    }

    public function test_fail_if_beijing_is_missing()
    {
        $solver = new FastShortestPathSolver(new InMemoryCitiesRepositoryWithoutBeijing());

        $this->expectException(BeijingNotFoundException::class);

        $solver->resolve();
    }
}