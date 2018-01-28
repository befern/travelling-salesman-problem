<?php

namespace Salesman\Test;

use PHPUnit\Framework\TestCase;
use Salesman\Solve;

class SolveTest extends TestCase
{
    /** @var Solve */
    private $solve;

    protected function setUp()
    {
        parent::setUp();
        $this->solve = new Solve();
    }


    public function testResolveSimplePath()
    {
        $this->assertEquals("1", $this->solve->resolve());
    }

}
