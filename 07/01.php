<?php

$currentDir = [];
$directories = [];
foreach (file('input.txt', FILE_IGNORE_NEW_LINES) as $line) {
    if ($line[0] === '$') {
        if (preg_match('#^\$ cd (.*?)$#mis', $line, $matches)) { // Change of dir
            if ($matches[1] === '/') {
                $currentDir = [];
            } elseif ($matches[1] === '..') {
                array_pop($currentDir);
            } else {
                $currentDir[] = $matches[1];
            }
        }
    } elseif ((int) $line[0] > 0) {
        $fileParts = [$size, $name] = explode(' ', $line, 2);

        $parentDir = $currentDir;
        while (count($parentDir) > 0) {
            $directories['/' . implode('/', $parentDir)][$name] = [
                'size' => $size,
                'name' => $name,
            ];
            array_pop($parentDir);
        }
    }
}

$totalDirSize = [];
foreach ($directories as $dir => $details) {
    $size = array_sum(array_map(fn ($file) => $file['size'], $details));
    if ($size <= 100_000) {
        $totalDirSize[$dir] = $size;
    }
}

echo "Part 01: " . array_sum($totalDirSize) . "\n";
