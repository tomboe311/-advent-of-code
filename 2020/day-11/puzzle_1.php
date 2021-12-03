<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/11
 */

$lines = explode("\n", file_get_contents("input_test"));


// empty seat = L
// floor = .
// occupied seat = #


/*
    If a seat is empty (L) and there are no occupied seats adjacent to it, the seat becomes occupied.
    If a seat is occupied (#) and four or more seats adjacent to it are also occupied, the seat becomes empty.
    Otherwise, the seat's state does not change.
 */


foreach ($lines as $key => $line) {
  $lines[$key] = mb_str_split($line);
}

//var_dump($lines);

function adjacent(&$lines, $y, $x) {
  $counter = 0;
  $index = $lines[$y][$x];

  switch ($index) {
    case 'L':
      $success = true;
      if (isset($lines[$y][$x + 1]) &&
          ($lines[$y][$x + 1] == '#' || $lines[$y][$x + 1] == '.')
      ) {
        $success = false;
      }
      if (isset($lines[$y][$x - 1]) &&
          ($lines[$y][$x - 1] == '#' || $lines[$y][$x - 1] == '.')
      ) {
        $success = false;
      }
      if (isset($lines[$y - 1][$x]) &&
          $lines[$y - 1][$x] == '#'
      ) {
        $success = false;
      }
      if (isset($lines[$y + 1][$x]) &&
          $lines[$y + 1][$x] == '#'
      ) {
        $success = false;
      }
      if (isset($lines[$y - 1][$x - 1]) &&
          $lines[$y - 1][$x - 1] == '#'
      ) {
        $success = false;
      }
      if (isset($lines[$y - 1][$x + 1]) &&
          $lines[$y - 1][$x + 1] == '#'
      ) {
        $success = false;
      }
      if (isset($lines[$y + 1][$x - 1]) &&
          $lines[$y + 1][$x - 1] == '#'
      ) {
        $success = false;
      }
      if (isset($lines[$y + 1][$x + 1]) &&
          $lines[$y + 1][$x + 1] == '#'
      ) {
        $success = false;
      }
     // return $success;
      if ($success) {
        $lines[$y][$x] = '#';
        return true;
      }
      break;
    case '#':
      if (isset($lines[$y][$x + 1]) &&
          $lines[$y][$x + 1] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y][$x - 1]) &&
          $lines[$y][$x - 1] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y - 1][$x]) &&
          $lines[$y - 1][$x] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y + 1][$x]) &&
          $lines[$y + 1][$x] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y - 1][$x - 1]) &&
          $lines[$y - 1][$x - 1] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y - 1][$x + 1]) &&
          $lines[$y - 1][$x + 1] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y + 1][$x - 1]) &&
          $lines[$y + 1][$x - 1] == '#'
      ) {
        $counter++;
      }
      if (isset($lines[$y + 1][$x + 1]) &&
          $lines[$y + 1][$x + 1] == '#'
      ) {
        $counter++;
      }

      if ($counter >= 4) {
        $lines[$y][$x] = 'L';
        return true;
      }
      return false;
  }

return false;
}

function getIndex($lines, $y, $x) {
  if ($y < 0) {
    return ' ';
  } elseif ($y >= count($lines)) {
    return ' ';
  } elseif ($x < 0) {
    return ' ';
  } elseif ($x >= count($lines[$y])) {
    return ' ';
  }
  return $lines[$y][$x];
}

$prev = [];
for ($round = 1; $round <= 3; $round++) {
  echo PHP_EOL . "round $round:" . PHP_EOL;
  for ($y = 0; $y < count($lines); $y++) {
    for ($x = 0; $x < count($lines[$y]); $x++) {
      $index = getIndex($lines, $y, $x);
      $prev[$y][$x] = $index; // DEBUG
      if ($index === 'L') {
        if (adjacent($lines, $y, $x)) {
          //$lines[$y][$x] = '#';
        }
      } elseif ($index === '#') {
        if (adjacent($lines, $y, $x)) {
          //$lines[$y][$x] = 'L';
        }
      }

    }
  }
  // debug
  echo PHP_EOL . "prev: " . PHP_EOL;
  for ($y = 0; $y < count($prev); $y++) {
    for ($x = 0; $x < count($prev[$y]); $x++) {
      echo $prev[$y][$x];
    }
    echo PHP_EOL;
  }

  echo PHP_EOL . "new: " . PHP_EOL;

  for ($y = 0; $y < count($lines); $y++) {
    for ($x = 0; $x < count($lines[$y]); $x++) {
      echo $lines[$y][$x];
    }
    echo PHP_EOL;
  }
  if ($round == 2) {
    die;
  }
}



