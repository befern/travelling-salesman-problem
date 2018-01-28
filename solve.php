<?php

include "vendor/autoload.php";

use Salesman\FastShortestPathSolver;
use Salesman\InFileCitiesRepository;

$solver = new FastShortestPathSolver(new InFileCitiesRepository($_SERVER['DOCUMENT_ROOT'] . "cities.txt"));

echo implode("\n", $solver->resolve()) . "\n";


