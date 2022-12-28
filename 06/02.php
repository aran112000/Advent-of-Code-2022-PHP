<?php
for ($i = 13, $chars = str_split(file_get_contents('input.txt')), $len = count($chars); $i < $len; $i++) {
    for ($ii = $i, $checkChars = []; $ii > $i-14; $ii--) $checkChars[] = $chars[$ii];
    if (count(array_unique($checkChars)) === 14) die("Part 02: " . $i+1 . "\n");
}
