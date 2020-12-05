<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/5
 */

$seats = explode("\n", file_get_contents("input"));

$highestSeatId = 0;
foreach ($seats as $seat) {
  $start = 0;
  $end = 127;
  $range = 128;

  for ($i = 0; $i < 6; $i++) {
    $range /= 2;
    if ($seat[$i] === 'F') {
      $end = $end - $range;
    } else {
      $start = $start + $range;
    }

  }

  if ($seat[6] == 'F') {
    $row = $start;
  } else {
    $row = $end;
  }

  $start = 0;
  $end = 7;
  $range = 8;
  for ($i = 7; $i < 10; $i++) {
    $range /= 2;
    if ($seat[$i] === 'L') {
      $end = $end - $range;
    } else {
      $start = $start + $range;
    }
  }

  $seatID = $row * 8 + $start;
  $highestSeatId = ($seatID > $highestSeatId) ? $seatID : $highestSeatId;

}

echo $highestSeatId . \PHP_EOL;
