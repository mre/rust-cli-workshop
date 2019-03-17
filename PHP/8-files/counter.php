<?php

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

    private function countBytes(string $input): int
    {
        return strlen($input);
    }

    private function countCharacters(string $input): int
    {
        return mb_strlen($input, 'UTF-8');
    }
}
