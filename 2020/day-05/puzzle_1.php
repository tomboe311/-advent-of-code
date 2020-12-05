<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/5
 */

$seats = explode("\n", file_get_contents("input"));

$ranges = [
  64,
  32,
  16,
  8,
  4,
  2
];

$rounds = 6;

$seatRanges = [
  4,
  2
];
$highestSeatId = 0;
foreach ($seats as $seat) {
  $start = 0;
  $end = 127;

  for ($i = 0; $i < $rounds; $i++) {
    if ($seat[$i] === 'F') {
      $end = $end - $ranges[$i];
    } else {
      $start = $start + $ranges[$i];
    }

  }

  if ($seat[6] == 'F') {
    $row = $start;
  } else {
    $row = $end;
  }

  $start = 0;
  $end = 7;
  //TODO
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
