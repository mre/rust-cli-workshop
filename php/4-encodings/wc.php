#!/usr/bin/env php
<?php

// Q: What happens when reading a non-ASCII encoding?

function countBytes($input)
{
    return strlen($input);
}

function countCharacters($input)
{
    return mb_strlen($input, 'UTF-8');
}

assert(countCharacters("她今天看起来很悲伤。") === 30);

$total = 0;
$stdin = fopen('php://stdin', 'r');

while (false !== ($line = fgets($stdin))) {
    $total += countCharacters($line);
}

fclose($stdin);
echo $total;