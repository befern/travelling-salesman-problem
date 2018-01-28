# Travelling Salesman Problem TSP

This project implements one way to solve the TSP for 32 cities without coming back to the start (Hamiltonian Path), 
which is an old problem about computing the shortest path for visiting all cities in a list without repeating any city.

The difficulty of the problem remains in the time of execution of this NP-Hard problem which is O(n!) and it gets not
feasible with a brute force attack already for 20 cities.

There are solutions for best paths like:

  Dynamic Programing O(n^2 * 2^n)

  Branch and Bound (solves problems with 40 to 60 cities)

In this project the problem has been solved not with an exact solution, but with a faster computation based on the
closest point to each city. This implementation in general returns a path 25% longer than the shortest path.

In this project are applied SOLID principles. 

To add to this project remains:
  Exact solution with Branch and Bound
  Acceptance test which gives feedback about solve.php script with the real data.



## Requirements

PHP 7.0

Composer

## How to install

    git clone https://github.com/befern/travelling-salesman-problem
    composer install

## Build Status

[![Build Status](https://travis-ci.org/befern/travelling-salesman-problem.svg?branch=master)](https://travis-ci.org/befern/travelling-salesman-problem)

## Run solver

In the project root:

    php solve.php
    
## References

[I'm an inline-style link] (https://en.wikipedia.org/wiki/Travelling_salesman_problem)
[I'm an inline-style link] (https://en.wikipedia.org/wiki/Branch_and_bound)
[I'm an inline-style link] (http://cs.indstate.edu/cpothineni/alg.pdf)