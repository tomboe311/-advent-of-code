<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/8
 */

$lines = explode("\n", file_get_contents("input"));


$accumulator = 0;

$i = 0;
$alreadyChecked = [];
do {
  if (in_array($i, $alreadyChecked)) {
    echo "$i already checked. Accumulator: $accumulator" . PHP_EOL;
    exit;
  }
  $alreadyChecked[] = $i;
  preg_match("/^(jmp|acc|nop) (\+|\-)(\d+)/",$lines[$i], $matches);
  list($matches, $operation, $action, $value) = $matches;

  switch ($operation) {
    case 'acc':
      $accumulator = ($action === '+' ? $accumulator + $value : $accumulator - $value);
      $i++;
      break;
    case 'jmp':
      $i = ($action === '+' ? $i + $value : $i - $value);
      break;
    case 'nop':
    default:
      $i++;
      break;
  }

  echo $operation . " " . $action . $value . " | " . $accumulator . PHP_EOL;
} while (true);
