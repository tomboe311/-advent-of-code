<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/7
 */

$allBags = explode("\n", file_get_contents("input_test"));
$searchedBags = ['shiny gold'];

foreach ($allBags as $line) {
  if (preg_match("/^(.*?) bags contain (.*?)\.$/", $line, $matches)) {
    list($matches, $color, $contents) = $matches;
    $rules[$color] = [];
    if ($contents !== 'no other bags') {
      foreach (explode(", ", $contents) as $element) {
        preg_match("/^(\d+) (.*?) bags?/", $element, $matches2);
        $rules[$color][] = $matches2[2];
      }
    }
  }

}

$count = 0;
$alreadyChecked =  [];
while ($toCheck = array_pop($searchedBags)) {
  foreach ($rules as $outerBag => $allowedBags) {
    if (in_array($outerBag, $alreadyChecked) || in_array($outerBag, $searchedBags)){
      continue;
    }
    if (in_array($toCheck, $allowedBags) && !in_array($toCheck, $alreadyChecked)) {
      $count++;
      $searchedBags[] = $outerBag;
      //echo "$outerBag \tholds " . json_encode($allowedBags, true) . " check: " . $toCheck . " search " . json_encode($searchedBags, true) . " count " .  $count. PHP_EOL;
    }
  }

  $alreadyChecked[] = $toCheck;
}

echo $count . PHP_EOL;