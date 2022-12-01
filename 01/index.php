<?php
$i = 0;
$elfCalories = [];
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $calorie) {
    if (!$calorie) {
        $i++;
        continue;
    }

    $elfCalories[$i] ??= 0;
    $elfCalories[$i] += $calorie;
}
rsort($elfCalories);

echo 'Part 1: ' . max($elfCalories) . PHP_EOL;
echo 'Part 2: ' . array_sum(array_splice($elfCalories, 0, 3));