<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/6
 */

$groups = explode("\n\n", file_get_contents("input"));
$sumOfYes = 0;

foreach ($groups as $group) {
  $people = explode("\n", $group);
  $yeses = [];
  foreach ($people as $person) {
    for ($i = 0; $i < strlen($person); $i++) {
      if (array_key_exists($person[$i], $yeses)) {
        $yeses[$person[$i]]++;
      } else {
        $yeses[$person[$i]] = 1;
      }
    }
  }

  foreach ($yeses as $y) {
    if ($y === count($people)) {
      $sumOfYes++;
    }
  }
}

echo $sumOfYes . \PHP_EOL;