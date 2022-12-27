<?php

$fullyContainedAssignments = 0;
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $pairs) {
    [$a, $b] = explode(',', $pairs, 2);
    [$aStart, $aEnd] = explode('-', $a);
    [$bStart, $bEnd] = explode('-', $b);

    $a = ',' . implode(',', range($aStart, $aEnd)) . ',';
    $b = ',' . implode(',', range($bStart, $bEnd)) . ',';

    if (str_contains($a, $b) || str_contains($b, $a)) {
        echo 'A: ' . $a . PHP_EOL;
        echo 'B: ' . $b . PHP_EOL . PHP_EOL;
        $fullyContainedAssignments++;
    }
}

// 541 = too high, 530 = too high
echo 'Part 01: ' . $fullyContainedAssignments . PHP_EOL;
