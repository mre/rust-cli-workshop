#!/usr/bin/env php
<?php

// * What about maintenance? (Object-oriented design)

class Counter
{
    public $bytes;
    public $chars;

    public function __construct__()
    {
        $this->bytes = 0;
        $this->chars = 0;
    }

    public function update(string $line)
    {
        $this->bytes += $this->countBytes($line);
        $this->chars += $this->countCharacters($line);
    }

    public function __toString()
    {
        return sprintf("%d %d", $this->bytes, $this->chars);
    }

    private function countBytes($input)
    {
        return strlen($input);
    }

    private function countCharacters($input)
    {
        return mb_strlen($input, 'UTF-8');
    }
}

$mode = "";
if ($argc > 1) {
    $mode = $argv[1];
}

$stdin = fopen('php://stdin', 'r');

$counter = new Counter();
while (false !== ($line = fgets($stdin))) {
    $counter->update($line);
}

fclose($stdin);

switch ($mode) {
    case "-m":
        echo $counter->bytes;
        break;
    case "-c":
        echo $counter->chars;
        break;
    default:
        echo $counter;
}
