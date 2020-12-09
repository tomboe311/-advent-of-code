<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/9
 */

$numbers = explode("\n", file_get_contents("input"));

$preambleSize = 25; // test with 5

function check($numbers, $numberToCheck) {
  for ($i = 0;$i<count($numbers);$i++) {
    for ($j=$i+1;$j<count($numbers);$j++) {
      if ($numbers[$i] + $numbers[$j] == $numberToCheck) {
        return true;
      }
    }
  }
  return false;
}

for ($i = $preambleSize; $i < count($numbers); $i++) {
  $preambles = array_slice($numbers, ($i-$preambleSize), $preambleSize);

  if (!check($preambles, $numbers[$i])) {
    echo $numbers[$i] . \PHP_EOL;
    exit;
  }
}
