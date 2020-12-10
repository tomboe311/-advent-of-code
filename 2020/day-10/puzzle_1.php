<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/10
 */

$outputJoltages = explode("\n", file_get_contents("input"));
$myDeviceJoltage = max($outputJoltages) + 3;
sort($outputJoltages);

$diffs = [];
for ($i = 0; $i < count($outputJoltages) -1; $i++) {
  $tmp = $outputJoltages[$i + 1] - $outputJoltages[$i];
  if (!array_key_exists($tmp, $diffs)) {
    $diffs[$tmp] = 1;
  }
  $diffs[$tmp]++;
}

echo $diffs[1] * $diffs[3] . PHP_EOL;