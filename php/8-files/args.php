<?php

class Arguments
{
    public $files = [];
    public $mode = null;

    // Try changing $mode to $flag in the input parameter
    // and then call the program with `-m` or `-c`.
    public function __construct(array $files, ?string $mode)
    {
        $this->files = $files;
        $this->mode = $mode;
    }
}

function parse(array $args): Arguments
{
    $mode = null;

    // Remove the binary name from the arg list
    array_shift($args);

    foreach ($args as $arg) {
        if (substr($arg, 0, 1) === "-") {
            $mode = $arg;
        } else {
            $files[] = $arg;
        }
    }
    return new Arguments($files, $mode);
}
