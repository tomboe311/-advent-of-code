<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/3
 */

$area = explode("\n", file_get_contents("input"));


function countTrees($area, $right, $down) {
  $pos = 0;
  $trees = 0;
  for ($row = $down; $row < count($area); $row +=$down) {
    $pos += $right;
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

  return $trees;
}


echo countTrees($area, 1, 1) * countTrees($area, 3, 1) * countTrees($area, 5, 1) * countTrees($area, 7, 1) * countTrees($area, 1, 2) . \PHP_EOL;
