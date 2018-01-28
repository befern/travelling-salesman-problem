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
        $this->assertEquals("Beijing,Tokyo,Vladivostok", $this->solve->resolve());
    }
}