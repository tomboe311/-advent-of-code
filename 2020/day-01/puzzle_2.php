<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/1
 */
$numbers = explode("\n", file_get_contents("input"));


for ($i = 0; $i < count($numbers); $i++) {
  for ($j = 0; $j < count($numbers); $j++) {
    for ($k = 0; $k < count($numbers); $k++) {
      if ($numbers[$i] + $numbers[$j] + $numbers[$k] === 2020) {
        echo ($numbers[$i] * $numbers[$j] * $numbers[$k]);
        exit(0);
      }
    }
  }
}

