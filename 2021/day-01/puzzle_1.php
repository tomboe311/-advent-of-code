<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2021/day/1
 */

$numbers = explode("\n", file_get_contents("input"));

$increased = 0;

for ($i = 1; $i < count($numbers); $i++) {
    if ($numbers[$i] > $numbers[$i-1]) {
      echo $numbers[$i] . " (increased)" . PHP_EOL;
      $increased++;
     } else {
      echo $numbers[$i] . " (decreased)" . PHP_EOL;
     }
}

echo "increased: $increased" . PHP_EOL;
