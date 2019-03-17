#!/usr/bin/env php
<?php

// Q: What happens to the file handle when you're done reading?

$total = 0;
$stdin = fopen('php://stdin', 'r');
while ($line = fgets($stdin)) {
    $total += countCharacters($line);
}
fclose($stdin);
echo $total;
