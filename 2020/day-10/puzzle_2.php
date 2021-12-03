<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/10
 */

$outputJoltages = explode("\n", file_get_contents("input_test"));
$myDeviceJoltage = max($outputJoltages) + 3;
array_push($outputJoltages, 0);
array_push($outputJoltages, $myDeviceJoltage);
sort($outputJoltages);

$variants = [];

function checkCombos($outputJoltages, $current, &$variants) {
  if ($current == array_key_last($outputJoltages)) {
    return true;
  }
  for ($i = $current + 1; $i <= $current + 3; $i++) {
    echo "$current $i". PHP_EOL;
    $lines = [];
    if (in_array($i, $outputJoltages)) {
      $lines[] = checkCombos($outputJoltages, $i, $variants);
    }
    $variants[$current] = count($lines);
  }

  //echo json_encode($variants, true) . PHP_EOL;
  return $variants[$current];
}

var_dump(checkCombos($outputJoltages, 0, $variants));
var_dump($variants, count($variants));
/*
$dp[1] = 1;
$len = count($outputJoltages);
$diffs = [];


for ($i = 1; $i < $len; $i++) {
  for ($j = 0; $j < $i; $j++) {
    if ($outputJoltages[$i] - $outputJoltages[$j] <= 3) {
      $dp[$i] += $dp[$j];
      //echo "$outputJoltages[$i], $outputJoltages[$j], $dp[$i], $dp[$j]" .PHP_EOL;
    }
  }
}
var_dump($outputJoltages);
var_dump($dp[$len-1]);
*/
/*

for ($i = 1; $i < $len; $i++) {
  for ($j = 0; $j < $i; $j++) {
    if (($i < $len - 1 && ($outputJoltages[$j] - $outputJoltages[$i] <= 3)) || ($i == $len - 1 && $outputJoltages[$j] - $outputJoltages[$i] == 3)) {
      $dp[$i] += $dp[$j];
      echo "$outputJoltages[$i], $outputJoltages[$j], $dp[$i], $dp[$j]" .PHP_EOL;
    }
  }
}
var_dump($outputJoltages);
var_dump($dp);
*/