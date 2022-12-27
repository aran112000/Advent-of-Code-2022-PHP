<?php

$scores = array_flip(['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']);

$priorities = [];
foreach (array_chunk(file('input.txt', FILE_IGNORE_NEW_LINES), 3) as $group) {
    foreach (str_split($group[0]) as $letter) {
        if (
            str_contains($group[1], $letter) &&
            str_contains($group[2], $letter)
        ) {
            $priorities[] = $scores[$letter];
            break;
        }
    }
}

echo 'Part 02: ' . array_sum($priorities) . PHP_EOL;
