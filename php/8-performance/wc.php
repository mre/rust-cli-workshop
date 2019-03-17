#!/usr/bin/env php
<?php

// Q: How do we count the number of characters in a string in PHP?

// function countCharacters($input)
// {
//     return strlen($input);
// }

// Q: How can we check that this works?

// assert(countCharacters("Hello World") === 11);

// $input = file_get_contents("php://stdin");
// echo countCharacters($input);

// Q: What happens when the input is really big?
// $total = 0;
// while ($line = fgets(STDIN)) {
//     $total += countCharacters($line);
// }
// echo $total;

// Q: What happens to the file handle when you're done reading?

// $total = 0;
// $stdin = fopen('php://stdin', 'r');
// while ($line = fgets($stdin)) {
//     $total += countCharacters($line);
// }
// fclose($stdin);
// echo $total;

// * What happens when you can't read from stdin?

// $total = 0;
// $stdin = fopen('php://stdin', 'r');

// while (false !== ($line = fgets($stdin))) {
//     $total += countCharacters($line);
// }
// fclose($stdin);
// echo $total;

// Q: What happens when reading a non-ASCII encoding?
// assert(countCharacters("她今天看起来很悲伤。") === 30);

// function countBytes($input)
// {
//     return strlen($input);
// }

// function countCharacters($input)
// {
//     return mb_strlen($input, 'UTF-8');
// }

// $total = 0;
// $stdin = fopen('php://stdin', 'r');

// while (false !== ($line = fgets($stdin))) {
//     $total += countCharacters($line);
// }

// fclose($stdin);
// echo $total;

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

// * What about maintenance? (Object-oriented design)
// * What about performance? (Multiple files)
