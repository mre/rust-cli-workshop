#!/usr/bin/env php
<?php

require_once "counter.php";
require_once "args.php";

// * What about maintenance (part II)? Includes

$args = parse($argv);

if (empty($args->files)) {
    $args->files = ['php://stdin'];
}

$counters = [];

foreach ($args->files as $file) {
    $handle = fopen($file, 'r');
    $counters[$file] = new Counter();
    while (false !== ($line = fgets($handle))) {
        $counters[$file]->update($line);
    }
    fclose($handle);
}

$total = 0;
foreach ($args->files as $file) {
    $counter = $counters[$file];
    switch ($args->mode) {
        case "-m":
            $count = $counter->bytes;
            break;
        case "-c":
            $count = $counter->chars;
            break;
        default:
            $count = $counter;
    }
    echo $count . " " . $file . PHP_EOL;
    $total += $count;
}

echo $count . " total" . PHP_EOL;