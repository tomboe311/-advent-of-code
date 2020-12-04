<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/4
 */


$passports = explode("\n", file_get_contents("input"));

function checkRequirement ($passport, $requirement) {

  if (strstr($passport, $requirement)) {
    return true;
  }
  return false;
}

var_dump($passports);
$requirements = [
  'byr',
  'iyr',
  'eyr',
  'hgt',
  'hcl',
  'ecl',
  'pid',
 // 'cid', //optional
];

$validPassports = 0;
$sumOfRequirements = 0;
foreach ($passports as $key => $passport) {
  if ($passport === '') {
    // empty next passport will start
    if ($sumOfRequirements == 7) {
      $validPassports++;
    }
    $sumOfRequirements = 0;
    continue;
  }

  foreach($requirements as $requirement) {
    if (checkRequirement($passport, $requirement)) {
      $sumOfRequirements++;
    }
  }
}

echo $validPassports . \PHP_EOL;
