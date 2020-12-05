<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/5
 */

$seats = explode("\n", file_get_contents("input"));

$highestSeatId = 0;
$seatIds = [];
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
 // echo $seat . " row: " . $row . " start: " . $start . " end: " . $end . " id ". $seatID . \PHP_EOL;

  array_push($seatIds, $seatID);
}


foreach ($seatIds as $seatId) {
  if (!in_array(($seatId + 1), $seatIds)) {
     echo ($seatId + 1) . \PHP_EOL;
  }
}


