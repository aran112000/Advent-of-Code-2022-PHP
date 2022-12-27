<?php

$finalScore = 0;
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $line) {
    [$theirMove, $desiredResult] = explode(' ', $line);

    if ($desiredResult === 'X') {
        // Loose
        if ($theirMove === 'A') { // Rock
            $ourMove = 'C';
        } elseif ($theirMove === 'B') { // Paper
            $ourMove = 'A';
        } else { // Scissors
            $ourMove = 'B';
        }

        $finalScore += (($ourMove === 'A' ? 1 : ($ourMove === 'B' ? 2 : 3)));
    } elseif ($desiredResult === 'Y') {
        $finalScore += 3 + (($theirMove === 'A' ? 1 : ($theirMove === 'B' ? 2 : 3))); // Draw
    } else {
        // Win
        if ($theirMove === 'A') { // Rock
            $ourMove = 'B';
        } elseif ($theirMove === 'B') { // Paper
            $ourMove = 'C';
        } else { // Scissors
            $ourMove = 'A';
        }

        $finalScore += 6 + (($ourMove === 'A' ? 1 : ($ourMove === 'B' ? 2 : 3)));
    }
}

echo "Final score: $finalScore\n";