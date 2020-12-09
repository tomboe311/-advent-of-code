<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/8
 */

$changed = [];
do {
  $accumulator = 0;
  $i = 0;
  $alreadyChecked = [];
  $alreadyChanged = false;
  $lines = explode("\n", file_get_contents("input"));

  do {
    if (in_array($i, $alreadyChecked)) {
      echo "$i already checked. loop detected! restart" . PHP_EOL;
      break;
    }

    $alreadyChecked[] = $i;
    preg_match("/^(jmp|acc|nop) (\+|\-)(\d+)/", $lines[$i], $matches);
    list($matches, $operation, $action, $value) = $matches;


    if (!in_array($i, $changed) && !$alreadyChanged) {
      if ($operation === 'jmp') {
        $operation = 'nop';
        $changed[] = $i;
        $alreadyChanged = true;
      } elseif ($operation === 'nop' && $value != 0) {
        $operation = 'jmp';
        $changed[] = $i;
        $alreadyChanged = true;
      }
    }

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

    //echo $operation . " " . $action . $value . " | " . $accumulator . PHP_EOL;

    if (!in_array($i, array_keys($lines))) {
      break;
    }
  } while (true);

} while ($i < count($lines));

echo "Accumulator: $accumulator" . PHP_EOL;
