#!/usr/bin/env php
<?php

// * What about commandline flags?

function countBytes($input)
{
    return strlen($input);
}

function countCharacters($input)
{
    return mb_strlen($input, 'UTF-8');
}

if ($argc != 2) {
    die("Usage: usage: wc [-cm]");
}
$mode = $argv[1];

$total = 0;
$stdin = fopen('php://stdin', 'r');

while (false !== ($line = fgets($stdin))) {
    if ($mode === '-m') {
        $total += countCharacters($line);
    } else {
        $total += countBytes($line);
    }
}

fclose($stdin);
echo $total;
