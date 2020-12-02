<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/2
 */

$contents = explode("\n", file_get_contents("input"));

$passwords = [];
foreach ($contents as $content) {
  array_push($passwords, explode(": ", $content));
}

$sum = 0;
foreach ($passwords as $key => $password) {
  $credentials = explode(" ", $password[0]);
  $limits = explode('-', $credentials[0]);

  // possible solution 1
  $position1 = mb_strpos($password[1], $credentials[1], $limits[0] - 1);
  $position2 = mb_strpos($password[1], $credentials[1], $limits[1] - 1);

  if (($position1 === $limits[0] - 1 && $position2 !== $limits[1] - 1) ||
      ($position1 !== $limits[0] - 1 && $position2 === $limits[1] - 1)
  ) {
    //$sum++;
  }

  // possible solution 2
  if (($password[1][$limits[0] - 1] === $credentials[1] && $password[1][$limits[1] - 1] !== $credentials[1]) ||
      ($password[1][$limits[0] - 1] !== $credentials[1] && $password[1][$limits[1] - 1] === $credentials[1])
  ) {
    $sum++;
  }

}

echo $sum;
