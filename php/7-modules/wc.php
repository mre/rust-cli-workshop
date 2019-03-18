#!/usr/bin/env php
<?php

require_once "counter.php";
require_once "args.php";

// * What about maintenance (part II)? Includes

$args = parse($argv);

$stdin = fopen('php://stdin', 'r');

$counter = new Counter();
while (false !== ($line = fgets($stdin))) {
    $counter->update($line);
}

fclose($stdin);

// Try to see what happens when you use a non-existing parameter name here, such
// as $args->flag.
switch ($args->mode) {
    case "-m":
        echo $counter->bytes;
        break;
    case "-c":
        echo $counter->chars;
        break;
    default:
        echo $counter;
}
