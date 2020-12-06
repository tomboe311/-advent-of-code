<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/6
 */

$groups = explode("\n\n", file_get_contents("input"));


$sumOfYes = 0;

foreach ($groups as $group) {
  $people = explode("\n", $group);
  $yeses = [];
  foreach ($people as $person) {
    for ($i = 0; $i < strlen($person); $i++) {
      $yeses[$person[$i]] = true;
    }
  }
  $sumOfYes += count($yeses);
}

echo $sumOfYes . \PHP_EOL;