<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/9
 */

$numbers = explode("\n", file_get_contents("input"));
$preambleSize = 25; // test with 5 live with 25


$invalidNumber = null;
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
    $invalidNumber = (int)$numbers[$i];
    break;
  }
}

echo "invalid number:" . $invalidNumber . PHP_EOL;

for ($i = 0; $i < count($numbers); $i++) {
  for ($count = 1; $count < count($numbers); $count++) {
    $sum = 0;
    $parts = array_slice($numbers, $i, $count);
    $sum = (int)array_sum($parts);

    if ($sum == $invalidNumber) {
      $min = (int)min($parts);
      $max = (int)max($parts);
      echo "min: $min max: $max sum: " . ($min+$max) . PHP_EOL;
      exit;
    }

    if ($sum > $invalidNumber) {
      //echo "sum > invalid". PHP_EOL;
      break;
    }
  }
}