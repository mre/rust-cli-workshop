#!/usr/bin/env php
<?php

// Q: What happens when the input is really big?

$total = 0;
while ($line = fgets(STDIN)) {
    $total += countCharacters($line);
}
echo $total;
