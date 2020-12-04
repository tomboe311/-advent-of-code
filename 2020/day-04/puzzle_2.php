<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/4
 */


$passports = explode("\n", file_get_contents("input"));

function checkRequirement ($passport, $requirement) {

  if (strstr($passport, $requirement)) {
    $rTypes = explode(" ", $passport);
    foreach ($rTypes as $rType) {
      $values = explode(":", $rType);
      if ($values[0] === $requirement) {
        switch ($requirement) {
          case 'byr':
            if (1920 <= $values[1] && $values[1] <= 2002) {
              return true;
            }
            break;
          case 'iyr':
            if (2010 <= $values[1] && $values[1] <= 2020) {
              return true;
            }
            break;
          case 'eyr':
            if (2020 <= $values[1] && $values[1] <= 2030) {
              return true;
            }
            break;
          case 'hgt':
            if (preg_match('/^(\d+)(cm|in)$/', $values[1], $matches)) {
              if ($matches[2] === 'cm') {
                if (150 <= $matches[1] && $matches[1] <= 193) {
                  return true;
                }
              } else {
                if (59 <= $matches[1] && $matches[1] <= 76) {
                  return true;
                }
              }
            }
            /*if (substr_compare($values[1], 'cm', -strlen('cm')) === 0) {
              if (150 <= $values[1] && $values[1] <= 193) {
                return true;
              }
            } elseif (substr_compare($values[1], 'in', -strlen('in')) === 0) {
              if (59 <= $values[1] && $values[1] <= 76) {
                return true;
              }
            }*/
            break;
          case 'hcl':
            if (preg_match('/^#[0-9a-f]{6}$/', $values[1])) {
              return true;
            }
            break;
          case 'ecl':
            if (in_array($values[1], ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'])) {
              return true;
            }
            break;
          case 'pid':
            if (preg_match('/^[0-9]{9}$/', $values[1])) {
              return true;
            }
            break;
        }
      }
    }
  }
  return false;
}
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
