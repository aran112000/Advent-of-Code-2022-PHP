<?php

$overlappingAssignments = 0;
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $pairs) {
    [$a, $b] = explode(',', $pairs, 2);
    [$aStart, $aEnd] = explode('-', $a);
    [$bStart, $bEnd] = explode('-', $b);

    $a = range($aStart, $aEnd);
    $b = range($bStart, $bEnd);

    if (count($a) >= count($b)) {
        foreach ($a as $i) {
            if (in_array($i, $b)) {
                $overlappingAssignments++;
                break;
            }
        }
    } else {
        foreach ($b as $i) {
            if (in_array($i, $a)) {
                $overlappingAssignments++;
                break;
            }
        }
    }
}

echo 'Part 02: ' . $overlappingAssignments . PHP_EOL;
