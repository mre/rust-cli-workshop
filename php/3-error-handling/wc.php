#!/usr/bin/env php
<?php

// * What happens when you can't read from stdin?

$total = 0;
$stdin = fopen('php://stdin', 'r');

while (false !== ($line = fgets($stdin))) {
    $total += countCharacters($line);
}
fclose($stdin);
echo $total;
