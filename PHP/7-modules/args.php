<?php

class Arguments
{
    public $files = [];
    public $mode = null;

    public function __construct($files, $mode)
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
