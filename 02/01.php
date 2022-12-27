<?php

$finalScore = 0;
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $line) {
    [$theirMove, $ourMove] = explode(' ', $line);
    $ourMove = ord($ourMove) - 23;
    $theirMove = ord($theirMove);

    $finalScore += ($ourMove - 64);
    if ($ourMove-1 === $theirMove || $ourMove+2 === $theirMove) {
        $finalScore += 6;
    } elseif ($ourMove === $theirMove) {
        $finalScore += 3;
    }
}

echo "Final score: $finalScore\n";