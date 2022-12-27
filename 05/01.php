<?php

$containerStacks = [];
[$sackString, $steps] = explode("\n\n", file_get_contents('input.txt'));

initialiseContainerStack($sackString, $containerStacks);

function initialiseContainerStack(string $sackString, array &$containerStacks)
{
    $containerStacks = [];

    $rows = array_reverse(explode("\n", $sackString));
    unset($rows[0]);

    foreach ($rows as $row) {
        $stack = $consecutiveSpaces = 0;
        foreach (str_split($row) as $char) {
            if ($char === ' ') {
                $consecutiveSpaces++;
            } else {
                $consecutiveSpaces = 0;
            }

            if ($consecutiveSpaces === 4) {
                $consecutiveSpaces = 0;
                $stack++;
            }

            if ($char >= 'A' && $char <= 'Z') {
                $containerStacks[$stack] ??= [];
                array_unshift($containerStacks[$stack], $char);
                $stack++;
            }
        }
    }
}

foreach (explode("\n", $steps) as $instruction) {
    $matches = [];
    preg_match('#^move (\d+) from (\d+) to (\d+)$#ms', $instruction, $matches);
    [, $move, $from, $to] = $matches;

    for ($i = 0; $i < $move; $i++) {
        array_unshift($containerStacks[$to-1], array_shift($containerStacks[$from-1]));
    }
}

echo 'Part 01: ';
foreach ($containerStacks as $stack) {
    echo $stack[0];
}
echo PHP_EOL;
