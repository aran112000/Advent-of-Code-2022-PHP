<?php

$result = 0;
for ($i = 3, $chars = str_split(file_get_contents('input.txt')), $len = count($chars); $i < $len; $i++) {
    if (count(array_unique([$chars[$i], $chars[$i-1], $chars[$i-2], $chars[$i-3]])) === 4) {
        $result = $i+1;
        break;
    }
}

echo "Part 01: $result\n";
