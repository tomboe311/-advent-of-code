<?php
/**
 * Advent of code
 *
 * Part 2
 * @url https://adventofcode.com/2020/day/7
 */

$exampleBags = "shiny gold bags contain 2 dark red bags.
dark red bags contain 2 dark orange bags.
dark orange bags contain 2 dark yellow bags.
dark yellow bags contain 2 dark green bags.
dark green bags contain 2 dark blue bags.
dark blue bags contain 2 dark violet bags.
dark violet bags contain no other bags.";

$allBags = explode("\n", $exampleBags);
//$allBags = explode("\n", file_get_contents("input"));
$searchedBags = ['shiny gold'];

foreach ($allBags as $line) {
  if (preg_match("/^(.*?) bags contain (.*?)\.$/", $line, $matches)) {
    list($matches, $color, $contents) = $matches;
    $rules[$color] = [];
    if ($contents !== 'no other bags') {
      foreach (explode(", ", $contents) as $element) {
        preg_match("/^(\d+) (.*?) bags?/", $element, $matches2);
        $rules[$color][$matches2[2]] = $matches2[1] ;
        echo $color . " " . $matches2[2] . " " . $matches2[1] . PHP_EOL;
      }
    }
  }

}

var_dump($rules);
$count = 0;
$alreadyChecked =  [];
$sumOfBags = 1;
$nextCount = 1;
$bags = [];

while ($toCheck = array_pop($searchedBags)) {
  foreach ($rules as $outerBag => $innerBags) {
    //echo $sumOfBags . " " . $outerBag . " " . json_encode($innerBags, true) . PHP_EOL;
    foreach ($innerBags as $innerBag => $sum) {
      $bags[$innerBag] = $sum;
      echo $sumOfBags . " " . $outerBag . " holds " . $sum . " " . $innerBag . PHP_EOL;
      //$searchedBags[] = $innerBag;
    }
  }
}

var_dump($bags);

/*while (count($searchedBags) > 0) {
  foreach ($searchedBags as $key => $searchedBag) {
    echo "$outerBag \tholds " . json_encode($allowedBags, true) . " check: " . $toCheck . " search " . json_encode($searchedBags, true) . " count " .  $count. PHP_EOL;
    foreach ($rules as $outerBag => $rule) {
      if ($outerBag === $searchedBag) {
        foreach ($rule as $innerBag => $sum) {
          for ($i = 0; $i < $sum; $i++) {
            $validBags[] = $innerBag;
            $searchForBags[] = $innerBag;
          }
        }
      }
    }

    unset($searchedBags[$key]);
  }
}

var_dump(count($validBags));*/

exit;
while ($toCheck = array_pop($searchedBags)) {
  foreach ($rules as $outerBag => $allowedBags) {
    if (in_array($outerBag, $alreadyChecked) || in_array($outerBag, $searchedBags)){
      continue;
    }
    //var_dump($toCheck, $outerBag);
    if ($toCheck === $outerBag) {
      foreach ($allowedBags as $innerBag => $sum) {
        echo $sumOfBags . " " . $toCheck . " " . $outerBag . " " . $innerBag . " " . $sum . PHP_EOL;
        $searchedBags[] = $innerBag;
        $sumOfBags = $sumOfBags + ($sumOfBags * $sum);
       // echo
        //$nextCount = $sum;
      }
    }

    /*foreach ($allowedBags as $innerBag => $sum) {
      if ($toCheck === $innerBag && !in_array($toCheck, $alreadyChecked)) {
        $count++;
        $searchedBags[] = $outerBag;
        echo "$outerBag \tholds " . json_encode($allowedBags, true) . " check: " . $toCheck . " search " . json_encode($searchedBags, true) . " count " .  $count. PHP_EOL;
      }
    }*/
    /*if (in_array($toCheck, $allowedBags) && !in_array($toCheck, $alreadyChecked)) {
      $count++;
      $searchedBags[] = $outerBag;
      echo "$outerBag \tholds " . json_encode($allowedBags, true) . " check: " . $toCheck . " search " . json_encode($searchedBags, true) . " count " .  $count. PHP_EOL;
    }*/
  }

  $alreadyChecked[] = $toCheck;
}

echo $count . PHP_EOL;
echo $sumOfBags . PHP_EOL;