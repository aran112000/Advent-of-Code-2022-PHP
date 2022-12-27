<?php

$scores = array_flip(['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']);

$priorities = [];
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $line) {
    [$bagA, $bagB] = str_split($line, strlen($line)/2);

    foreach (str_split($bagA) as $bagALetter) {
        if (str_contains($bagB, $bagALetter)) {
            $priorities[] = $scores[$bagALetter];
            break;
        }
    }
}

echo 'Part 01: ' . array_sum($priorities) . PHP_EOL;
