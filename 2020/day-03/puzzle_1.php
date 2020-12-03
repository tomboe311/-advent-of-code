<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/3
 */

$area = explode("\n", file_get_contents("input"));

$pos = 0;
$trees = 0;
for ($row = 1; $row < count($area); $row++) {
  $pos += 3;
  if ($pos >= mb_strlen($area[$row])) {
    $pos = $pos % mb_strlen($area[$row]);
  }
  if ($area[$row][$pos] == '#') {
    $trees++;
  }
  if ($row == array_key_last($area)) {
    break;
  }
}

echo $trees . \PHP_EOL;