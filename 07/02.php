<?php

$currentDir = $directories = $directoriesCombined = [];
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
        $details = ['size' => $size, 'name' => $name];
        $directories['/' . implode('/', $currentDir)][$name] = $details;
        $parentDir = $currentDir;
        while (count($parentDir) > 0) {
            $directoriesCombined['/' . implode('/', $parentDir)][$name] = $details;
            array_pop($parentDir);
        }
    }
}

$totalDirSize = $totalDirSizeCombined = [];
foreach ($directories as $dir => $details) {
    $size = array_sum(array_map(fn ($file) => $file['size'], $details));
    $totalDirSize[$dir] = $size;
}
foreach ($directoriesCombined as $dir => $details) {
    $size = array_sum(array_map(fn ($file) => $file['size'], $details));
    $totalDirSizeCombined[$dir] = $size;
}

$totalUsedSpace = array_sum($totalDirSize);
$unusedSpace = 70_000_000 - $totalUsedSpace;
$spaceToBeFreed = 30_000_000 - $unusedSpace;

asort($totalDirSizeCombined, SORT_NUMERIC);

foreach ($totalDirSizeCombined as $dir => $dirSize) {
    if ($dirSize >= $spaceToBeFreed) {
        die($dir . ' (' . $dirSize . ')') . PHP_EOL;
    }
}
